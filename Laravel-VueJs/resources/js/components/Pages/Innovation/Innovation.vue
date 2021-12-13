<template>
  <div class="main-innovation">
    <Header />
    <Slider />
    <BreadCrumb />
    <Paragraph
      data-aos="fade-up"
      data-aos-offset=""
      data-aos-delay="50"
      data-aos-duration="500"
      data-aos-easing="ease-in-out"
      data-aos-mirror="true"
    />
    <ContainerOuter
        :getMenuID="getMenuMainID"
     />
   <div class="footer">
      <Footer1 />
      <Footer2 />
  </div>
  </div>
</template>

<script>
import Slider from "SrcComponent/components/Pages/Innovation/Slider.vue";
import BreadCrumb from "SrcComponent/components/Pages/Innovation/BreadCrumb.vue";
import ContainerOuter from "SrcComponent/components/Pages/Innovation/ContainerOuter.vue";
import Paragraph from "SrcComponent/components/Pages/Innovation/Paragraph.vue";
import Header from "SrcComponent/components/Products/Header.vue";
import Footer1 from "SrcComponent/components/Products/Footer1.vue";
import Footer2 from "SrcComponent/components/Products/Footer2.vue";
export default {
  name: "Innovation.vue",
  components: {
    Slider,
    BreadCrumb,
    ContainerOuter,
    Paragraph,
    Header,
    Footer1,
    Footer2,
  },
  data() {
    return {
      data: [],
      getMenuMainID: 0,
    };
  },
  methods: {
    async getData() {
      const url = "/api/all-menu";
      const response = await fetch(url);
      const data = await response.json();

      return data;
    },
  },
  async created() {
      this.data = await this.getData();
      this.getMenuMainID = this.data.filter(item => item.id == 4)[0].id;
  },
};
</script>

<style scoped>
.bg-header {
  background: black;
  padding: 25px 90px;
}

#logo1 {
  padding-right: 50px;
}
.navbar-dark .navbar-nav .nav-link{
  color: white;
}
.navbar-dark .navbar-nav .nav-link:hover{
  color: #00adef;
}
.iconsearch a{
  padding-left: 10px;
  color: white;
}
.icon-i-right{
  float: right;
}
.navbar-toggler{
  background:white;
}
</style>
