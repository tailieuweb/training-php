<template>
  <div id="banner__slides">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div :class="[itemClass, item.active]" v-for="(item, index) in slides" :key="index">
          <img class="d-block w-100" :src="item.image" alt="First slide" />
          <div class="carousel-caption">
            <div class="container slide-title-learn-more">
              <h3 class="animate__animated animate__fadeInDown animate__delay-1s" :class="item.color">
                {{ item.title }}
              </h3>
              <a href="#" class=" animate__animated animate__fadeInDown animate__delay-2s">
                {{ item.btn_text }}
              </a>
            </div>
          </div>
          <div class="carousel-description">
            <div
              class="container slide-description animate__animated animate__fadeInDown animate__delay-2s">
              <p>
                {{ item.des_1 }}
              </p>
              <p>
                {{ item.des_2 }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleControls"
        role="button"
        style="z-index: 100"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleControls"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="search bg-dark">
      <div class="container">
        <form class="form-search">
          <input
            type="text"
            class="search-input"
            placeholder="I am looking for..."
          />
          <button class="btn"><i class="fab fa-searchengin"></i></button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SlidesSearch",
  data() {
    return {
      itemClass: "carousel-item",
      slides: []
    };
  },
  methods : {
      async getDataApi(){
          const url = "/api/slides";
          const response = await fetch(url);
          const data = await response.json();
          return data;
      },
  },
  async created(){
      this.slides = await this.getDataApi();
  }
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap");

#banner__slides {
  background: #f4f4f4;
}

.carousel-caption {
  top: 0;
  left: 0;
  bottom: auto;
  text-align: left;
}

.carousel-caption .container {
  line-height: 6rem;
  padding-left: 10%;
  padding-top: 3%;
}

.carousel-caption h3 {
  font-size: 2.5rem;
  font-family: "Lora", serif;
  font-weight: 200;
  width: 65%;
}

.carousel-caption a {
  background: #444444;
  padding: 10px 40px 12px;
  border: 1px solid #444444;
  border-radius: 0;
  color: #ddd;
  text-decoration: none;
}

.carousel-caption a:hover {
  text-decoration: none;
  background: #1f1f1f;
  color: #fff;
}

.carousel-description {
  position: absolute;
  bottom: 0;
  left: 0;
}

.carousel-description .slide-description {
  margin: 0 10%;
  padding-left: 9%;
  padding-bottom: 3%;
}

.carousel-description p {
  font-family: "Lora" serif;
  color: #fff;
  font-size: 14px;
  font-weight: 400;
}

.carousel-description .slide-description p:nth-child(2) {
  width: 60%;
}

.search {
  padding: 25px 0;
  position: relative;
  top: 0;
}

form.form-search {
  position: relative;
  background: #fff;
  width: 100%;
  height: 50px;
}

form input {
  position: absolute;
  font-family: "Lora", serif;
  font-size: 18px;
  width: 100%;
  height: 100%;
  border: none;
  box-shadow: none;
  outline: none;
  padding: 5px 15px;
}

form .btn {
  position: absolute;
  top: 6px;
  right: 7px;
}

/* CSS cho tỷ lệ màn hình trên 1280px */
@media screen and (min-width: 1280px) {
  .carousel-caption {
    left: 2%;
  }
  .carousel-caption .container {
    max-width: 90%;
  }
}

/* CSS cho tỷ lệ màn hình dưới 1280px*/
@media screen and (max-width: 1280px) {
  .carousel-caption {
    left: 9%;
  }
}

/* CSS cho tỷ lệ màn hình dưới 1200px*/
@media screen and (max-width: 1200px) {
  .carousel-caption {
    left: 0;
  }
  .carousel-caption .container {
    line-height: 4rem;
    max-width: 92%;
  }

  .carousel-caption a {
    padding: 6px 30px 8px;
  }

  .carousel-caption h3 {
    width: 60%;
  }

  .carousel-item:last-child .carousel-caption h3 {
    width: 75%;
  }

  .carousel-description .slide-description {
    padding-left: 3.8%;
  }
}

/* CSS cho tỷ lệ màn hình dưới 1024px*/
@media screen and (max-width: 1024px) {
  .carousel-caption h3 {
    font-size: 2rem;
  }

  .carousel-description p {
    font-size: 12px;
  }

  .carousel-description .slide-description p:nth-child(2) {
    width: 90%;
  }

  .carousel-description .slide-description {
    padding-bottom: 0%;
  }

  .carousel-caption h3 {
    width: 75%;
  }

  .carousel-item:last-child .carousel-caption h3 {
    width: 70%;
  }
}

/* CSS cho tỷ lệ màn hình dưới 768px */
@media screen and (max-width: 768px) {
  .carousel {
    height: 640px;
  }

  .carousel-caption {
    position: inherit;
  }

  .carousel-caption .container {
    padding-left: 0%;
    max-width: 73%;
  }

  .carousel-caption h3 {
    color: black !important;
  }

  .carousel-caption a {
    padding: 6px 20px 7px;
    font-size: 14px;
    display: inline-block;
    line-height: 20px;
  }

  .carousel-description {
    position: inherit;
  }

  .carousel-description p {
    color: black;
  }

  .carousel-caption h3 {
    width: 100%;
    font-size: 28px;
    letter-spacing: -1.5px;
  }
  .carousel-item:last-child .carousel-caption h3 {
    width: 100%;
  }

  .carousel-control-prev,
  .carousel-control-next {
    align-items: inherit;
    top: 6rem;
  }
}

/* CSS cho tỷ lệ màn hình dưới 480px */
@media screen and (max-width: 480px) {
  .carousel-caption {
    width: 85%;
    margin-right: 0;
    padding-left: 20px;
  }

  .carousel-caption h3 {
    font-size: 23px;
  }

  .carousel-caption .container {
    max-width: 80%;
  }

  .carousel-description {
    width: 90%;
  }
  .carousel-caption a {
    font-size: 14px;
    display: inline-block;
    line-height: 20px;
    margin-top: 20px;
  }

  .carousel-item:nth-child(3) .carousel-caption {
    width: 100%;
  }

  .carousel-item:nth-child(3) .carousel-caption a {
    width: 95%;
    margin-top: 20px;
    font-size: 15px;
    line-height: 18px;
    display: block;
  }

  .carousel-control-prev,
  .carousel-control-next {
    align-items: inherit;
    top: 4.5rem;
  }
}

/* CSS cho tỷ lệ màn hình dưới 320px - Iphone */
@media screen and (max-width: 320px) {
  .carousel {
    height: 621px;
  }

  .carousel-caption .container {
    max-width: 86%;
  }

  .carousel-caption a {
    font-size: 12px;
  }

  .carousel-control-prev,
  .carousel-control-next {
    align-items: inherit;
    top: 3.7rem;
  }
}

/* CSS cho tỷ lệ màn hình dưới 240px - Smart phone nhỏ */
@media screen and (max-width: 240px) {
  .carousel {
    height: 650px;
  }
  .carousel-control-prev,
  .carousel-control-next {
    align-items: inherit;
    top: 2.5rem;
  }
}
</style>
