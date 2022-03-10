<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link class="nav-link" :to="{ name: 'home' }">
            <img id="logo" :src="logo" alt="Logo" />
        </router-link>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-5">
                <li
                    class="nav-item"
                    v-for="(item, index) in menuItems"
                    :key="index"
                >
                    <router-link
                        class="nav-link active"
                        :to="{ name: item.href }"
                    >
                        {{ item.label }}
                    </router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Header",
    data() {
        return {
            logo: require("../../img/logo.jpeg"),
            menuItems: [
                {
                    label: "Home",
                    href: "home",
                },
                {
                    label: "Posts",
                    href: "posts",
                },
                {
                    label: "About us",
                    href: "about",
                },
            ],
        };
    },
};
</script>

<style lang="scss">
.navbar {
    #logo {
        width: 40px;
    }
}
</style>
