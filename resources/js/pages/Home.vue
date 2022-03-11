<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Home-Page</h1>
            </div>
        </div>
        <Main :cards="cards" @changePage="changePage($event)"></Main>
    </div>
</template>

<script>
import axios from "axios";
import Main from "../components/Main.vue";
export default {
    name: "Home",
    components: {
        Main,
    },
    data() {
        return {
            cards: {
                posts: null,
                nextPage: null,
                prevPage: null,
            },
        };
    },
    methods: {
        getPosts(url) {
            axios
                .get(url, { headers: { Authorization: "Bearer abc123" } })
                .then((result) => {
                    this.cards.posts = result.data.results.posts.data;
                    this.cards.nextPage =
                        result.data.results.posts.next_page_url;
                    this.cards.prevPage =
                        result.data.results.posts.prev_page_url;
                })
                .catch((error) => console.log(error));
        },
        changePage(change) {
            let url = this.cards[change];
            if (url) {
                this.getPosts(url);
            }
        },
    },
    created() {
        this.getPosts("http://127.0.0.1:8000/api/posts");
    },
};
</script>

<style></style>
