<template>
    <section id="company">
        <!-- <Header />
        <b-tabs pills card content-class="mt-3" align="center">
            <b-tab title="About us" active>
                <Banner />
                <Glance />
            </b-tab>
            <b-tab title="Career">
                <Slides01 />
                <Glance />
            </b-tab>
            <b-tab title="Media">
                <Banner />
                <Glance />
            </b-tab>
            <b-tab title="Daimler AG Investors">
                <Slides01 />
                <Glance />
            </b-tab>
        </b-tabs>
        <Footer01 /> -->
        <Header />
        <!-- Components Company -->
        <Menu />
        <Banner />
         <Glance />
        <Slides01 />
        <BenzCar />
        <Slides02 />
        <BenzVans />
        <OurGoal />
        <Ambition />
        <Purpose />
        <OurCorporate />
        <ImageBottom />
        <!-- Footer -->
        <Footer01 />
        <!-- <Footer02 /> -->
    </section>
</template>
<script>
import Header from "../../../components/Products/Header.vue";
import Footer01 from "../../../components/Products/Footer1.vue";
import Footer02 from "../../../components/Products/Footer2.vue";
import Menu from "../../../components/Pages/Company/MenuCompany.vue";
import Banner from "../../../components/Pages/Company/BannerCompany.vue";
import Glance from "../../../components/Pages/Company/GlanceIntro.vue";
import Slides01 from "../../../components/Pages/Company/SlidesCompany01.vue";
import BenzCar from "../../../components/Pages/Company/MecBenzCarIntro.vue";
import Slides02 from "../../../components/Pages/Company/SlidesCompany02.vue";
import BenzVans from "../../../components/Pages/Company/MecBenzVanintro.vue";
import OurGoal from "../../../components/Pages/Company/OutGoalIntro.vue";
import Ambition from "../../../components/Pages/Company/AmbitionIntro.vue";
import Purpose from "../../../components/Pages/Company/ThePurposeIntro.vue";
import OurCorporate from "../../../components/Pages/Company/OurCorporateIntro.vue";
import ImageBottom from "../../../components/Pages/Company/ImageBottom.vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue-3/dist/bootstrap-vue-3.css";
export default {
    components: {
        Menu,
        Header,
        Footer01,
        Footer02,
        Banner,
        Glance,
        Slides01,
        BenzCar,
        Slides02,
        BenzVans,
        OurGoal,
        Ambition,
        Purpose,
        OurCorporate,
        ImageBottom,
    },
};
</script>
<style scoped>
#company {
    background: #ffffff;
}
</style>
