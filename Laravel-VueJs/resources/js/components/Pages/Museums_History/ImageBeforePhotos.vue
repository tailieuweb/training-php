<template>
    <section id="img__bottom">
        <b-row>
            <b-col md="4" data-aos ="fade-up"
                        data-aos-duration="1800">
                    <b-img :src="img1"></b-img>
                    <h2>Classic Store.</h2>
                    <b-card-text>
                           Find a large collection of Mercedes-Benz accessories, model cars, fashion, watches, literature and much more in our Mercedes-Benz Classic online shop.
                    </b-card-text>
                    <b-link href="#">Visit the online shop </b-link>

            </b-col>
            <b-col md="4" data-aos ="fade-up"
                        data-aos-duration="1800">
                    <b-img :src="img2"></b-img>
                    <h2>Classic Part Search.</h2>
                    <b-card-text>Use the online Classic Part Search to find availabilities and information for 110,000 original parts for your classic Mercedes-Benz.</b-card-text>
                    <b-link href="#"> Go to Classic Part Search </b-link>
            </b-col>
            <b-col md="4" data-aos ="fade-up"
                        data-aos-duration="1800">
                    <b-img :src="img3"></b-img>
                    <h2>Classic Center Fellbach.</h2>
                    <b-card-text>Fulfill your dream of owning a classic Mercedes-Benz car from the Classic Center Fellbach.</b-card-text>
                    <b-link href="#"> Go to Classic Center  </b-link>
            </b-col>
        </b-row>
    </section>
</template>
<script>
import img01 from "../../../../assets/img-museums/mercedes-benz-classic-online-shop-2560x1440.webp";
import img02 from "../../../../assets/img-museums/mbcom_classic_teilesuche_titel_parts11_2560x1440.webp";
import img03 from "../../../../assets/img-museums/01-mercedes-benz-classic-centerfellbach-header-2560x1440.webp";
export default {
    data() {
        return {
                img1: img01,
                img2: img02,
                img3: img03 ,
        };
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap");
#img__bottom {
    max-width: 1680px;
    background-color: #000;
    color: #fff;
    position: relative;
    overflow: hidden;
}

.row {
    width: 100%;
}

img {
    width: 105%;
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
    width: 220px;
    height: 45px;
    color: #fff;
    background: #000;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #fff;
}
a:hover {
    background: #fff;
    color: #000;
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
@media screen and (max-width: 1280px) {
    #img__bottom {
        max-width: 1180px;
    }
}
@media screen and (max-width: 1024px) {
    #img__bottom {
        max-width: 964px;
    }

}
@media screen and (max-width: 768px) {
    #img__bottom {
        max-width: 720px;
    }
}
@media screen and (max-width: 580px) {
    #img__bottom {
        max-width: 500px;
    }
    h2 {
        font-size: 1.4rem;
    }
}
@media screen and (max-width: 480px) {
    #img__bottom {
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
    #img__bottom {
        max-width: 340px;
    }
    h2 {
        font-size: 1.2rem;
    }
}
</style>
