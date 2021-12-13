<template>
<!-- Header -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-header">
      <div class="logo-header">
        <a href="" class="top-logo">
          <img
            id="logo1" src="https://www.mercedes-benz.com/etc/designs/brandhub/frontend/static-assets/header/logo.svg" alt=""  />
          <img
            id="logo2" src="https://www.mercedes-benz.com/etc/designs/brandhub/frontend/static-assets/header/brand-without-claim.svg" alt="" />
        </a>
      </div>
      <button
        class="navbar-toggler"
        type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul  class="navbar-nav ml-auto">
          <li class="nav-item" v-for="item in data" :key="item.id">
            <a class="nav-link" :href="item.link"> {{item.name}} </a>
          </li>
        </ul>
      </div>
      <!-- Search -->
      <!-- <div class="iconsearch ">
        <a href=""><i class="fas fa-search"></i></a>
      </div> -->
    </nav>
  </header>

</template>

<script>
import { createApp } from 'vue';
export default {
    name: "Header.vue",
    data(){
      return {
        data: [],
      };
    },
    methods: {
      async getData(){
        const url = "/api/all-menu";
        const response = await fetch(url);
        const data = await response.json();

        return data;
      },
    },

    async created() {
      this.data = await this.getData();
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
  background:darkgray;
}
</style>
