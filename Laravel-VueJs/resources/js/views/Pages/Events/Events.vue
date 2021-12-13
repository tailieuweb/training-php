<template>
    <Header/>
    <Events/>
    <Footer1/>
    <Footer2/>
</template>

<script>
import Events from 'SrcComponent/components/Pages/Events/Events.vue';
import Header from "SrcComponent/components/Products/Header.vue";
import Footer1 from "SrcComponent/components/Products/Footer1.vue";
import Footer2 from "SrcComponent/components/Products/Footer2.vue";
export default {
    name : "Pages/Events.vue",
    components : {
     Header,
     Events,
     Footer1,
     Footer2,
    }
}
</script>

<style scoped>
</style>
