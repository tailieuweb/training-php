<template>
    <section id="banner">
        <div class="img__banner" v-for="(item, i) in menu" :key="i">
            <b-img v-if="item.active === 'active'" :src="item.banner_img" alt="banner" />
        </div>

    </section>
</template>
<script>

export default {
    data() {
        return {
            menu: [],
        };
    },
    methods: {
        async getDataApi() {
            const url = "/api/menu-banner";
            const response = await fetch(url);
            const data = await response.json();
            return data;
        },
    },
    async created() {
        this.menu = await this.getDataApi();
    },
};
</script>
<style scoped>
#banner {
    max-width: 1680px;
    background: #ffffff;
}
#banner .img__banner {
    width: 100%;
    height: 100%;
}

#banner .img__banner img {
    width: 100%;
    height: 100%;
}
</style>
