<template>
    <section id="recent">
        <b-container>
            <h1 class="title__top" data-aos ="fade-up"
                        data-aos-duration="1800"> Recent Articles.</h1>
        </b-container>
    </section>
</template>
<script>
export default {
    data() {
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap");

#recent {
    max-width: 1680px;
    height: 294px;
    background: #000;
    color: #fff;
    font-family: sans-serif;
}

#recent .container {
    max-width: 1265px;
}

#recent h1,
#recent h2,
#recent p {
    margin: 0;
}

#recent h1,
#recent h2 {
    text-align: center;
    font-family: "Lora", serif;
    font-size: 60px;
    line-height: 60px;
    font-weight: 200;
    letter-spacing: -2px;
}

#recent h1{
   position: relative;
    top: 5.5rem;
}

#recent ul.top__link {
    position: relative;
    top: 13px;
}

#recent p {
    text-align: center;
    font-size: 15px;
    text-indent: 25px;
    padding: 0 30px;
    line-height: 23px;
    letter-spacing: 1px;
}

#recent .top__link a span {
    color: #333;
}

#recent .top__link a:hover span {
    color: #00adef;
}

#recent .top__link a i{
    position: relative;
    left: 18px;
    font-size: 15px;
}

#recent .top__link a i,
#recent .top__link a span,
#recent p:last-child {
    color: #fff;
    text-align: center;
}

#recent .top__link li.active span {
    color: #00adef;
}

@media screen and (max-width: 1024px) {
    #recent  {
        padding-bottom: 20px;
    }
}
@media screen and (max-width: 768px) {
    #recent{
        height: 970px;
    }
    #recent h1,
    #recent h2 {
        font-size: 1.8rem;
    }
}
@media screen and (max-width: 600px) {
    #recent {
        height: 1150px;
    }
}
@media screen and (max-width: 480px) {
    #recent{
        height: 1450px;
    }
    #recent h1,
    #recent h2 {
        font-size: 1.5rem;
    }
}
@media screen and (max-width: 380px) {
    #recent {
        height: 1550px;
    }
}
@media screen and (max-width: 280px) {
    #recent{
        height: 2100px;
    }
}


</style>
