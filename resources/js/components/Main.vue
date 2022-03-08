<template>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col" v-for="(post, index) in posts" :key="index">
            <div class="card">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text">
                        {{ post.content }}
                    </p>
                </div>
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
        };
    },
    created() {
        axios.get("http://127.0.0.1:8000/api/posts").then((result) => {
            // console.log(result.data.results.posts);
            this.posts = result.data.results.posts;
        });
    },
};
</script>

<style></style>
