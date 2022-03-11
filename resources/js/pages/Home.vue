<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Home-Page</h1>
            </div>
        </div>
        <Loading v-if="loading" />
        <Main :cards="cards" @changePage="changePage($event)" v-else></Main>
    </div>
</template>

<script>
import axios from "axios";
import Main from "../components/Main.vue";
import Loading from "../components/Loading.vue";
export default {
    name: "Home",
    components: {
        Main,
        Loading,
    },
    data() {
        return {
            loading: false,
            cards: {
                posts: null,
                nextPage: null,
                prevPage: null,
            },
        };
    },
    methods: {
        getPosts(url) {
            this.loading = true;
            setTimeout(() => {
                axios
                    .get(url, { headers: { Authorization: "Bearer abc123" } })
                    .then((result) => {
                        this.cards.posts = result.data.results.posts.data;
                        this.cards.nextPage =
                            result.data.results.posts.next_page_url;
                        this.cards.prevPage =
                            result.data.results.posts.prev_page_url;
                        this.loading = false;
                    })
                    .catch((error) => console.log(error));
            }, 2500);
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
