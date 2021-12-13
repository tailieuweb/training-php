<template>
    <section id="img__recent">
        <b-row>
            <b-col  md="4"  v-for="(item, i) in btImg" :key="i" data-aos ="fade-up"
                        data-aos-duration="1800">
                <div class="group1">
                    <b-img :src="item.img"></b-img>
                    <h2>{{ item.text }}</h2>
                </div>
            </b-col>
        </b-row>
        <!-- <b-row>
            <b-col  md="4" v-for="(item, i) in btImg2" :key="i" data-aos ="fade-up"
                        data-aos-duration="1800">
                <div class="group2">
                    <b-img :src="item.img"></b-img>
                    <h2>{{ item.text }}</h2>
                </div>
            </b-col>
        </b-row>
        <b-row>
            <b-col md="4"  v-for="(item, i) in btImg3" :key="i" data-aos ="fade-up"
                        data-aos-duration="1800">
                <div class="group3">
                    <b-img :src="item.img"></b-img>
                    <h2>{{ item.text }}</h2>
                </div>
            </b-col>
        </b-row> -->
    </section>
</template>
<script>
import img1 from "../../../../assets/img-museums/01-mercedes-benz-classic-magazine-it-must-be-love-2560x1440.webp";
import img2 from "../../../../assets/img-museums/01-mercedes-benz-classic-magazine-dad-route-2560x1440.webp";
import img3 from "../../../../assets/img-museums/01-mercedes-benz-history-in-orbit-for-100-years-2560x1440.webp";
import img4 from "../../../../assets/img-museums/01-mercedes-benz-classic-magazine-south-american-adventure-2560x1440.webp";
import img5 from "../../../../assets/img-museums/01-mercedes-benz-classic-history-c-126-2560x1440.webp";
import img6 from "../../../../assets/img-museums/01-mercedes-benz-classic-sl-special-2560x1440.webp";
import img7 from "../../../../assets/img-museums/01-classic-serviceparts-header-2560x1440.webp";
import img8 from "../../../../assets/img-museums/01-mercedes-benz-classic-center-expertise-2560x1440.webp";
import img9 from "../../../../assets/img-museums/01-mercedes-benz-museum-rudolf-caracciola-2560x1440.webp";
export default {
    data() {
        return {
            btImg: [
                // { img: img1, text: "It must be love. More and more young people are driving and celebrating Mercedes-Benz classics. A journey through a very colourful, passionate scene." },
                // { img: img2, text: "On the “Dad Route”: A success story. With hard work and luck, dreams can come true. Danny Lucas believed it and wrote his own success story." },
                // { img: img3, text: "In orbit for 100 years. The Mercedes star in the ring turns 100: the trademark was registered by the Daimler-Motoren-Gesellschaft i..." },
            ],
            // btImg2: [
                // { img: img4, text: "South American adventure. After a year of pandemic, Kevin and Lars see their Mercedes-Benz 300 TE left behind in the jungle again."},
                // { img: img5, text: "The epic SEC. Born in 1981: the SEC Coupés of the 126 model series." },
                // { img: img6, text: "The Mercedes-Benz SL. There is no end to the fascination of the Mercedes-Benz SL: each generation is a chapter in this tradition ..." },
            // ],
            // btImg3: [
                // { img: img7, text: "Classic spare parts. Mercedes-Benz Classic offers genuine spare parts of the highest quality for the preservation of your classi..." },
                // { img: img8, text: "Manufacturer’s expert assessment. The unique confirmation of the originality of your classic: reliable, transparent, from Mercedes-Benz Class..." },
                // { img: img9, text: "Master of Silver Arrows. Rudolf Caracciola is the most successful German racing driver of the 1930s. Hot on his heels at the Mercede..." },
            // ],
        };
    },
         methods: {
        async getDataApi() {
            const url = "/api/image-recent-museum";
            const response = await fetch(url);
            const data = await response.json();
            return data;
        },
    },
    async created() {
        this.btImg = await this.getDataApi();
        // this.btImg2 = await this.getDataApi();
        // this.btImg3 = await this.getDataApi();
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap");
#img__recent {
    max-width: 1680px;
    background-color: #000;
    position: relative;
    overflow: hidden;

}

.row {
    max-width: 1300px;
    padding-left: 48px;
}
.group1 {
    max-width: 1349px;
    max-height: 891px;
    padding: 2px;
    cursor: pointer;
}
.group2 {
    max-width: 1349px;
    max-height: 891px;
    padding: 2px;
    cursor: pointer;
}
.group3 {
    max-width: 1349px;
    max-height: 891px;
    padding: 2px;
    cursor: pointer;
}
/* .group4{
    border-bottom: 2px solid transparent;
    border-left: 1px solid transparent;
    border-right: 1px solid transparent;
    float: left;
    overflow: hidden;
    position: relative;
    width: 25%;

} */

img {
    width: 105%;
}

h2 {
    margin: 0;
    position: absolute;
    bottom: 0;
    color: #fff;
    font-family: "Lora", serif;
    font-size: 22px;
    font-weight: 200;
    letter-spacing: -2px;
    background-color: rgba(0, 0, 0, 0.3);
    width: 100%;
    height: 65px;
    padding-top: 20px;
    padding-left: 20px;
    transition: 0.5s all ease;
}

.group1:hover h2 {
    height: 150px;
    background-color: rgba(0, 0, 0, 0.6);
}
.group2:hover h2 {
    height: 150px;
    background-color: rgba(0, 0, 0, 0.6);
}
.group3:hover h2 {
    height: 150px;
    background-color: rgba(0, 0, 0, 0.6);
}

@media screen and (max-width: 1280px) {
    #img__recent {
        max-width: 1180px;
    }
}
@media screen and (max-width: 1024px) {
    #img__recent {
        max-width: 964px;
    }
    .left {
        margin-bottom: 15px;
    }
}
@media screen and (max-width: 768px) {
    #img__recent {
        max-width: 720px;
    }
}
@media screen and (max-width: 580px) {
    #img__recent {
        max-width: 500px;
    }
    h2 {
        font-size: 1.4rem;
    }
}
@media screen and (max-width: 480px) {
    #img__recent {
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
    #img__recent {
        max-width: 340px;
    }
    h2 {
        font-size: 1.2rem;
    }
}

</style>
