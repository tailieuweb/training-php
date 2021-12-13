<template>
    <section id="mec__benz__car">
        <b-container>
            <b-row>
                <b-col md="4" data-aos ="fade-up"
                        data-aos-duration="1800">
                    <div class="img">
                        <b-img :src="img"></b-img>
                    </div>
                </b-col>
                <b-col md="4" data-aos ="fade-up"
                        data-aos-duration="1800">
                    <div class="title_left">
                        <h2>Opening hours.</h2>
                        <p v-for="item in items1" :key="item ">{{item.text}}</p>
                        <b-button variant="outline-secondary">To the Mercedes-Benz Museum</b-button>
                    </div>
                </b-col>
                <b-col md="4" data-aos ="fade-up"
                        data-aos-duration="1800" >
                    <div class="title_right">
                        <h2>Exhibitions & events.</h2>
                       <p v-for="item in items2" :key="item ">{{item.text}}</p>
                        <b-link> Learn more </b-link>
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </section>
</template>
<script>
import intro from "../../../../assets/img-museums/01-at-the-mercedes-benz-museum-with-2560x1440.webp";
export default {
        data() {
        return {
            img: intro,
            items1: [
            {text: "Tue to Sun, from 9 a.m. to 6 p.m. "},
            {text: "Last admission is at 5 p.m."},  
            {text: "Closed on Mondays."},
            {text: "Please see our opening times for public"},
            {text: 'holidays.'}
            ],
                        items2: [
            {text: "Classics & Coffee"},
            {text: "Special exhibition: Future Mobility"},  
            {text: "experimenta"},

            ],

        };
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap");

#mec__benz__car {
    max-width: 1680px;
    height: 418px;
    background: #000;
    color: #fff;
}

.container{
    max-width: 1280px;
        padding-left: 48px;
}

h2,
p,
a {
    margin: 0;
    text-decoration: none;
}

h2 {
    font-size: 2rem;
    font-family: "Lora", serif;
    letter-spacing: -1px;
    font-weight: 300;
}

p{
    text-indent: 25px;
    font-size: 14px;
    letter-spacing: 1px;
    line-height: 30px;
    text-align: start;
    font-family: sans-serif;
}

.row {
    position: relative;
    top: 55px;
}

a {
    width: 110px;
    height: 45px;
    color: #fff;
    background: #00adef;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    top: 30px;
}

a:hover {
    background: #0088c6;
    color: #fff;
}

.title_left,
.title_right {
    padding: 0 30px;
}
img{
    width: 100%;
}
#mec__benz__car 
.intro__right {
    position: relative;
    top :10px
}
@media screen and (max-width: 1024px) {
    #mec__benz__car {
        height: 695px;
    }
    #mec__benz__car .container {
        max-width: 960px;
    }
    p {
        padding-bottom: 20px;
    }
    a {
        top: 10px;
    }
    h1 {
        padding: 0 30px;
    }
    h2 {
        top: 9.5rem;
    }
}
@media screen and (max-width: 768px) {
    #mec__benz__car {
        height: 740px;
    }
    #mec__benz__car .container {
        max-width: 720px;
    }
}
@media screen and (max-width: 600px) {
    #mec__benz__car {
        height: 830px;
    }
    h1 {
        font-size: 1.7rem;
    }
    #mec__benz__car .container {
        max-width: 480px;
    }
}
@media screen and (max-width: 480px) {
    #mec__benz__car {
        height: 930px;
    }
    #mec__benz__car .container {
        max-width: 380px;
    }
    a {
        width: 100%;
    }
}
@media screen and (max-width: 380px) {
    #mec__benz__car {
        height: 930px;
    }
    #mec__benz__car .container {
        max-width: 365px;
    }
}
@media screen and (max-width: 280px) {
    #mec__benz__car {
        height: 1050px;
    }
    h1 {
        font-size: 1.3rem;
    }
    #mec__benz__car .container {
        max-width: 280px;
    }
    h1,
    .text {
        padding: 0 15px;
    }
}
</style>
