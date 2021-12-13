<template>
    <!-- Gọi các cpn tạo ra trang chi tiết !-->
    <main>
     <ProductDetail />
     </main>
</template>

<script>
import ProductDetail from "../../components/Products/ProductDetail.vue";
export default {
    name : 'CarsDetail',
    components : {
        ProductDetail
    }
}
</script>

<style scoped>
main{
    background: black;
}
@media all and (max-width: 600px){
  main{
      width: 3023565%;
  }
}
@media all and (max-width: 770px){
  main{
      width: 190%;
  }
}
</style>
