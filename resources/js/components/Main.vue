<template>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col" v-for="(post, index) in posts" :key="index">
                <div class="card">
                    <img
                        :src="
                            require('../../../storage/app/public/uploads/products/default.png')
                        "
                        class="card-img-top w-100"
                        :alt="post.title"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">
                            {{ post.content }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="list-unstyled">
                    <li>
                        <button
                            v-if="prevPage"
                            @click="changePage('prevPage')"
                            class="btn btn-primary"
                        >
                            Prev
                        </button>
                        <button
                            v-if="nextPage"
                            @click="changePage('nextPage')"
                            class="btn btn-primary"
                        >
                            Next
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Main",
    data() {
        return {
            posts: [],
            nextPage: null,
            prevPage: null,
        };
    },
    methods: {
        changePage(change) {
            let url = this[change];
            if (url) {
                this.getPosts(url);
            }
        },
        getPosts(url) {
            axios.get(url).then((result) => {
                this.posts = result.data.results.posts.data;
                this.nextPage = result.data.results.posts.next_page_url;
                this.prevPage = result.data.results.posts.prev_page_url;
            });
        },
    },
    created() {
        this.getPosts("http://127.0.0.1:8000/api/posts");
    },
};
</script>

<style></style>
