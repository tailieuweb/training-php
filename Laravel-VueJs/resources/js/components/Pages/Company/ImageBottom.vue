<template>
    <section id="img__bottom">
        <b-row>
            <b-col xl="4" md="6" xs="12" v-for="(item, i) in btImg" :key="i">
                <div
                    class="group"
                    data-aos="fade-up"
                    data-aos-duration="1800"
                    v-bind:data-aos-delay="200 * (i + 2)"
                >
                    <b-img :src="item.img"></b-img>
                    <h2>{{ item.text }}</h2>
                </div>
            </b-col>
        </b-row>
    </section>
</template>
<script>
export default {
    data() {
        return {
            btImg: [

            ],
        };
    },
     methods: {
        async getDataApi() {
            const url = "/api/company-images-post";
            const response = await fetch(url);
            const data = await response.json();
            return data;
        },
    },
    async created() {
        this.btImg = await this.getDataApi();
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap");
#img__bottom {
    max-width: 1680px;
    background-color: #000;
    position: relative;
    overflow: hidden;
}

.row {
    width: 100%;
}
.group {
    max-width: 560px;
    max-height: 315px;
    padding: 3px;
    cursor: pointer;
}

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

.group:hover h2 {
    height: 150px;
    background-color: rgba(0, 0, 0, 0.6);
}
</style>
