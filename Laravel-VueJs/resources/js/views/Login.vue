<template>
    <!--Gọi login vào views!-->
    <main>
         <Login />
    </main>

</template>
<script>
import Login from "../components/Login.vue";
export default {
    components: {
        Login,
    },
};
</script>

<style scoped>
body{
    background: #2554FF;
}
</style>
