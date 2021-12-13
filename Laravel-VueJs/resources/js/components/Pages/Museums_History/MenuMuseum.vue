<template>
       <section id="menu__museum">
        <b-container>
            <b-nav>
                <li v-for="(item, i) in menu" :key="i">
                    <b-link href="#" :class="item.active">{{
                        item.menu_name
                    }}</b-link>
                </li>
            </b-nav>
        </b-container>
    </section>
</template>
<script>
export default {
    data() {
        return {
            menu: [
                // { link: "Mercedes-Benz Classic", active : "active" },
                // { link: "Museum" },
                // { link: "History" },
                // { link: "Classic Center" },
                // { link: "Classic spare parts " },
                // { link: " Brand Clubs " },
                // { link: " Magazine" },
            ],
        };
    },
        methods: {
        async getDataApi() {
            const url = "/api/banner-museum";
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
#menu__museum {
    max-width: 1680px;
    height: 90px;
    background: #1f1f1f;
    position: sticky;
    z-index: 100;
    top: -1px;
}

#menu__museum .container {
    height: 100%;
}

#menu__museum li {
    list-style-type: none;
}
#menu__museum a.active{
    color: #fff;
    position: relative;
}

#menu__museum a.active::before {
    content: '';
    position: absolute;
    left: 0px;
    color: #fff;
    width: 100%;
    bottom: 0;
    border-bottom: 1px solid #fff;
}

#menu__museum a:visited {
    color: #fff;
}

#menu__museum a {
    height: 100%;
    font-size: 16px;
    display: flex;
    align-items: center;
    text-decoration: none;
    font-size: 16px;
    color: hsla(0, 0%, 100%, 0.5);
    padding: 0 25px;
}

#menu__museum a:hover {
    color: #fff;
}

#menu__museum .nav {
    justify-content: center;
    height: 100%;
}

#menu__museum .nav .nav-item > .nav-link {
    background: #fff;
}

</style>
