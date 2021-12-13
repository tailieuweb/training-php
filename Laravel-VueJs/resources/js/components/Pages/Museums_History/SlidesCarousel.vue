<template>
    <section id="slide" data-aos ="fade-up"
                        data-aos-duration="1800">
        <b-carousel
            id="carousel-animation-01"
            controls
            img-width="1680"
            background="#ffffff"
            :interval="4500"
            v-model="slide"
            @sliding-start="onSlideStart"
            @sliding-end="onSlideEnd"
        >
            <b-carousel-slide
                v-for="(item, index) in isSlides"
                :key="index"
                :img-src="item.image"
                :class="item.active"

            >
            </b-carousel-slide>
        </b-carousel>
    </section>
</template>
<script>
import img1 from "../../../../assets/img-museums/01-mercedes-benz-classic-magazine-south-american-adventure-2560x1440.webp";
import img2 from "../../../../assets/img-museums/01-mercedes-benz-classic-history-c-126-2560x1440.webp";
import img3 from "../../../../assets/img-museums/01-mercedes-benz-classic-sl-special-2560x1440.webp";
import img4 from "../../../../assets/img-museums/01-classic-serviceparts-header-2560x1440.webp";
import img5 from "../../../../assets/img-museums/01-mercedes-benz-classic-center-expertise-2560x1440.webp";
import img6 from "../../../../assets/img-museums/01-mercedes-benz-museum-rudolf-caracciola-2560x1440.webp";


export default {
    data() {
        return {
            slide: 0,
            sliding: null,
            isSlides: [
                // { img: img1, active: "active" },
                // { img: img2 },
                // { img: img3 },
                // { img: img4 },
                // { img: img5 },
                // { img: img6 },
            ],
        };
    },
     methods: {
       async getDataApi() {
            const url = "/api/slides-carousel-museum";
            const response = await fetch(url);
            const data = await response.json();
            return data;
        },
    },
    async created() {
        this.isSlides = await this.getDataApi();
    },
};
</script>
<style scoped>
#slide {
    max-width: 1680px;
    background-color: #000000;
}
</style>
