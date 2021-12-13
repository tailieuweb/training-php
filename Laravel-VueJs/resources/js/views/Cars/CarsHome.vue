<template>
  <!-- Gọi các cpn tạo ra trang home !-->
  <!-- @test="getMenuID" -->
  <Header

  />
  <SliderSearch />
  <Product />
  <div class="footer">
    <!-- <div class="container"> -->
      <Footer1 />
      <Footer2 />
    <!-- </div> -->
  </div>
</template>

<script>
import Header from "../../components/Products/Header.vue";
import SliderSearch from "../../components/Products/SliderSearch.vue";
import Product from "../../components/Products/Product.vue";
import Footer1 from "../../components/Products/Footer1.vue";
import Footer2 from "../../components/Products/Footer2.vue";
export default {
  name: "CarsHome",
  components: {
    Header,
    SliderSearch,
    Product,
    Footer1,
    Footer2,
  },
  methods :{
  }
};
</script>

<style scoped>
.footer{
    background: #000;
}
</style>
