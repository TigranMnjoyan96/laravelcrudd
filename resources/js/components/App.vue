<template>
    <div>
        <navbar />
        <div class="container">
            <router-view />
        </div>
    </div>
</template>

<script>
    import Navbar from "./partials/Navbar";

    export default {
        name: "App",
        components: {
            Navbar
        }
    }
</script>

<style scoped>

</style>
