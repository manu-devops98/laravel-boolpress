<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center p-3">Post - {{ post.title }}</h1>
                <div class="card w-50 mx-auto">
                    <img
                        :src="
                            require('../../../storage/app/public/uploads/products/default.png')
                        "
                        class="card-img-top"
                        :alt="post.title"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">{{ post.content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "Product",
    props: ["id"],
    data() {
        return {
            post: null,
        };
    },
    methods: {
        getPost(url) {
            axios.get(url).then((result) => {
                // console.log(result);
                this.post = result.data.results.data;
                // console.log(this.post);
            });
        },
    },
    created() {
        this.getPost("http://127.0.0.1:8000/api/posts/" + this.id);
    },
};
</script>

<style></style>
