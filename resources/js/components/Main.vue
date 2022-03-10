<template>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div
                class="col"
                v-for="(post, index) in cards.posts"
                :key="index + 'key'"
            >
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
                        <p class="card-text fs-6 text-dark">
                            {{ post.content }}
                        </p>
                    </div>
                    <router-link
                        class="btn btn-primary w-50 mx-auto mb-4"
                        :to="{ name: 'post', params: { id: post.id } }"
                        >View Post</router-link
                    >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="list-unstyled">
                    <li>
                        <button
                            v-if="cards.prevPage"
                            @click="changePage('prevPage')"
                            class="btn btn-primary"
                        >
                            Prev
                        </button>
                        <button
                            v-if="cards.nextPage"
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
    props: ["cards"],
    methods: {
        changePage(change) {
            this.$emit("changePage", change);
        },
    },
};
</script>

<style></style>
