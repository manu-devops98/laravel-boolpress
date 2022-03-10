<template>
    <div>
        <Header></Header>
        <router-view></router-view>
    </div>
</template>

<script>
// import Main from "../components/Main.vue";
import Header from "../components/Header.vue";
export default {
    name: "App",
    components: {
        Header,
    },
};
</script>

<style lang="scss">
@import "~bootstrap/scss/bootstrap";
</style>
