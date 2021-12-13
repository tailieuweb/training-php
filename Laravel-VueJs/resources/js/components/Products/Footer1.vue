<template>
  <footer id="footer__1">
    <!-- Top Footer -->
    <section id="top__footer">
      <div class="container-fluid">
        <div class="row" data-aos ="fade-up"
                        data-aos-duration="1800">
          <div class="col-md-3 mx-auto brand__items" v-for="item in data" :key="item.id">
            <h3 class="title">{{item.topics}}</h3>
            <hr class="brand__line" />
            <ul class="brand__links" >
              <li v-for="item2 in JSON.parse(item.subfooter)" :key="item2"><a href="">{{item2.name}}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- Botom Footer -->
    <section id="bottom__footer">
      <div class="container_fluid" data-aos ="fade-up"
                        data-aos-duration="1800">
        <h3 class="title">Stay informed</h3>
        <hr class="brand__line" />
        <p class="bottom__footer__descriptons">
          Follow us and use the following social media platforms to get in
          contact with us and to share your passion for the brand, products and
          services of Mercedes-Benz.
        </p>
        <div class="icon">
          <ul class="social__media">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
          </ul>
        </div>

      </div>
    </section>
  </footer>
</template>

<script>
export default {
    name: "Footer1.vue",
    data(){
      return {
        data: [],
      };
    },
    methods: {
        async getData(){
            const url = "/api/all-footer";
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
@import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap");

#footer__1 {
  background: #000;
  color: #fff;
  font-family: "Lora", serif;
}

h3.title {
  font-size: 29px;
  font-weight: 300;
  letter-spacing: -2px;
}

.brand__items {
  padding: 0;
  padding-top: 32px;
}

hr.brand__line {
  border-top: 1px solid #313131;
  margin: 30px 0;
}

ul {
  padding: 0;
  margin: 0;
}

li {
  list-style-type: none;
}

a {
  text-decoration: none;
  color: #999;
  font-size: 14px;
  font-family: sans-serif;
  line-height: 22px;
  transition: 0.4s all ease;
}

a:hover {
  color: #00adef;
  text-decoration-line: underline;
}

#top__footer {
  /* margin: 0 32px; */
  max-width: 1320px;
  margin: 0 auto;
}

#bottom__footer{
    /* margin: 0 32px; */
    max-width: 1320px;
     margin: 0 auto;
}


p.bottom__footer__descriptons{
    color: #999;
    font-size: 14px;
    width: 45%;
     font-family: sans-serif;
}

ul.social__media{
    display: flex;
    margin-top: 1.5rem;
}

 ul.social__media li {
   width: 45%;

}

ul.social__media li a i{
  font-size: 25px;
}
@media screen and (max-width: 1280px) {
  #top__footer {
max-width: 92%;
}


#bottom__footer{
    max-width: 92%;
}
ul.social__media li{
   width: 45%;

}
@media screen and (max-width: 768px) {
  ul.social__media li{
    width: 45%;
    }
  }

@media screen and (max-width: 480px) {
  ul.social__media li{
    width: 100%;
    }
  }
  @media screen and (max-width: 320px) {
  ul.social__media li{
    width: 100%;
    }
  }
  @media screen and (max-width: 240px) {
  ul.social__media li{
    width: 100%;
    }
  }
}
</style>
