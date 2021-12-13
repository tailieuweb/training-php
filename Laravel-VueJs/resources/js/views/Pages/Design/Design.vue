<template>
    <Header />
    <Design
      data-aos="fade-up"
              data-aos-offset="5"
              data-aos-delay="50"
              data-aos-duration="500"
              data-aos-easing="ease-in-out"
              data-aos-mirror="true"
              data-aos-once="false"
    />
    <Footer1 />
    <Footer2 />
</template>

<script>
import Design from 'SrcComponent/components/Pages/Design/Design.vue';
import Header from "SrcComponent/components/Products/Header.vue";
import Footer1 from "SrcComponent/components/Products/Footer1.vue";
import Footer2 from "SrcComponent/components/Products/Footer2.vue";
export default {
    name : "Pages/Design.vue",
    components : {
     Design,
     Header,
     Footer1,
     Footer2
    }
}
</script>

<style scoped>

</style>
