<template>
    <section id="intro">
      <div class="container" data-aos ="fade-up"
                        data-aos-duration="1800">
        <h1 class="title__top">Follow the Mercedes-Benz Museum</h1>
        <div class="icon">
          <ul class="social__media">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          </ul>
        </div>

      </div>
    </section>
</template>
<script>
export default {

    data(){
      return {
        data: [],
      };
    },


};

</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap");

#intro {
    max-width: 1680px;
    height: 430px;
    background: #000;
    color: #fff;
    font-family: sans-serif;
}

#intro .container {
    max-width: 1265px;
}

#intro h1,
#intro h2,
#intro p {
    margin: 0;
}

#intro h1,
#intro h2 {
    text-align: center;
    font-family: "Lora", serif;
    font-size: 60px;
    line-height: 60px;
    font-weight: 200;
    letter-spacing: -2px;
}

#intro h1{
   position: relative;
    top: 5.5rem;
}


#intro .icon {
    position: relative;
    top: 10rem;
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


#bottom__footer{
    margin: 0 32px;
    max-width: 1280px;
}



ul.social__media{
    display: flex;
    justify-content: center;
}


ul.social__media li a i{
  font-size: 40px;
  padding: 10px;
  color: #fff;
} 

@media screen and (max-width: 1024px) {
    #intro p {
        padding-bottom: 20px;
    }
}
@media screen and (max-width: 768px) {
    #intro {
        height: 970px;
    }
    #intro h1,
    #intro h2,
    #intro ul.social__media li a i {
        font-size: 1.8rem;
    }
}
@media screen and (max-width: 600px) {
    #intro {
        height: 1150px;
    }
}
@media screen and (max-width: 480px) {
    #intro {
        height: 1450px;
    }
    #intro h1,
    #intro h2,
    #intro ul.social__media li a i {
        font-size: 1.5rem;
    }
}
@media screen and (max-width: 380px) {
    #intro {
        height: 1550px;
    }
}
@media screen and (max-width: 280px) {
    #intro {
        height: 2100px;
    }
}
</style>
