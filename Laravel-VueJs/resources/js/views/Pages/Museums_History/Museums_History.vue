<template>
    <section id="museums_history">
        <Header />
        <!-- Components Museums & History -->
        <Banner />
        <Menu />
        <Intro />
        <BeforeRecenLeft />
        <Recent />
        <ImageRecent />
        <IntroMuseum />
        <MecBenzHoursntro />
        <HistoryMecRight />
        <ImageBeforePhotos />
        <ThePhoto />
        <SlidesCarousel />
        <Follow />
      
        <!-- Footer -->
        <Footer01 />
        <!-- <Footer02 /> -->
        <Footer2 />
    </section>
</template>
<script>
import Header from "../../../components/Products/Header.vue";
import Footer01 from "../../../components/Products/Footer1.vue";
import Menu from "../../../components/Pages/Museums_History/MenuMuseum.vue";
import Banner from "../../../components/Pages/Museums_History/BannerMuseum.vue";
import Intro from "../../../components/Pages/Museums_History/Intro.vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue-3/dist/bootstrap-vue-3.css";
import Recent from "../../../components/Pages/Museums_History/Recent.vue";
import ImageRecent from "../../../components/Pages/Museums_History/ImageRecent.vue";
import IntroMuseum from "../../../components/Pages/Museums_History/IntroMuseum.vue";
import MecBenzHoursntro from "../../../components/Pages/Museums_History/MecBenzHoursntro.vue";
import BeforeRecenLeft from "../../../components/Pages/Museums_History/BeforeRecenLeft.vue";
import HistoryMecRight from "../../../components/Pages/Museums_History/HistoryMecRight.vue";
import ImageBeforePhotos from "../../../components/Pages/Museums_History/ImageBeforePhotos.vue";
import Footer2 from "../../../components/Products/Footer2.vue";
import ThePhoto from "../../../components/Pages/Museums_History/ThePhoto.vue";
import SlidesCarousel from "../../../components/Pages/Museums_History/SlidesCarousel.vue";
import Follow from "../../../components/Pages/Museums_History/Follow.vue";

export default {
    components: {
    Menu,
    Header,
    Footer01,
    Banner,
    Intro,
    MecBenzHoursntro,
    Recent,
    ImageRecent,
    IntroMuseum,
    MecBenzHoursntro,
    BeforeRecenLeft,
    HistoryMecRight,
    ImageBeforePhotos,
    Footer2,
    ThePhoto,
    SlidesCarousel,
    Follow
},
};
</script>
<style scoped>
#museums_history {
    background: #000;
}
</style>
