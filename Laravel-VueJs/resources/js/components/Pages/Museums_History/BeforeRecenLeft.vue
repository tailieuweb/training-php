<template>
    <section id="recent"  >
        <b-container v-for="item in recent"
                    :key="item">
            <b-row >
                <b-col xl ="4" md="12" >
                    <div class="left">
                        <h2 data-aos ="fade-up"
                        data-aos-duration="1800">
                            <!-- Mercedes-Benz Classic. -->
                            {{item.title}}
                        </h2>
                        <b-card-text data-aos ="fade-up"
                        data-aos-duration="1800">
                            <!-- Experience a journey through time in the Mercedes-Benz Museum, fulfill your dream of a Mercedes-Benz classic car or learn more about our brand clubs. -->
                            {{item.text}}
                        </b-card-text>
                        <b-img  :src="item.img1" data-aos ="fade-up"
                        data-aos-duration="1500"/>
                    </div>
                </b-col>
                <b-col xl= "8" md="12" >
                    <div class="right">
                        <b-img  :src="item.img1" data-aos ="fade-up"
                        data-aos-duration="1500" />
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </section>
</template>
<script>
import intro from "../../../../assets/img-museums/06-mercedes-benz-classic-2560x1440.webp";
import intro1 from "../../../../assets/img-museums/05-mercedes-benz-classic-2560x1440.webp"

export default {
    data() {
        return {
            // img1: intro1,
            // img2: intro
            recent:[],
        };
    },
     methods: {
        async getDataApi() {
            const url = "/api/before-recent-museum";
            const response = await fetch(url);
            const data = await response.json();
            return data;
        },
    },
    async created() {
        this.recent = await this.getDataApi();
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap");

#recent {
    max-width: 1680px;
    padding: 50px 0;
    background-color: #000;
    color: #fff;
}

.container {
    max-width: 1265px;
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

a {
    width: 110px;
    height: 45px;
    color: #fff;
    background: #00adef;
    display: flex;
    align-items: center;
    justify-content: center;
}
a:hover {
    background: #0088c6;
    color: #fff;
}

p {
    text-indent: 0px;
    font-size: 13px;
    font-weight: 400;
    letter-spacing: 1px;
    line-height: 20px;
    text-align: start;
    font-family: sans-serif;
    padding: 33px 0;
    padding-right: 20px;
}

/* .right{
    width: 100%;
    background-image: url("../../../../assets/img-museums/06-mercedes-benz-classic-2560x1440.webp");
} */

img{
    width: 100%;
}

@media screen and (max-width: 1280px) {
    .container {
        max-width: 1180px;
    }
}
@media screen and (max-width: 1024px) {
    .container {
        max-width: 964px;
    }
    .left {
        margin-bottom: 15px;
    }
}
@media screen and (max-width: 768px) {
    .container {
        max-width: 720px;
    }
}
@media screen and (max-width: 580px) {
    .container {
        max-width: 500px;
    }
    h2 {
        font-size: 1.4rem;
    }
}
@media screen and (max-width: 480px) {
    .container {
        max-width: 380px;
    }
    h2 {
        font-size: 1.2rem;
    }
    a {
        width: 100%;
    }
}
@media screen and (max-width: 380px) {
    .container {
        max-width: 340px;
    }
    h2 {
        font-size: 1.2rem;
    }
}
</style>
