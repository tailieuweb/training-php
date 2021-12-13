<template>
    <section id="slide__01">
        <b-carousel
            id="carousel-animation-01"
            controls
            img-width="1680"
            background="#ffffff"
            :interval="5500"
            v-model="slide"
            data-aos="fade-up"
            data-aos-duration="1500"
             data-aos-offset="100"
             data-aos-delay="30"
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
export default {
    data() {
        return {
            slide: 0,
            sliding: null,
            isSlides: [
            ],
        };
    },
     methods: {
        async getDataApi() {
            const url = "/api/company-slide-01";
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
#slide__01 {
    max-width: 1680px;
    background-color: #000000;
    overflow: hidden;
}
</style>
