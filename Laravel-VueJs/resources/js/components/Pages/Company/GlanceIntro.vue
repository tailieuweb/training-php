<template>
    <section id="glance__intro">
        <b-container>
            <b-nav class="top__link">
                <b-nav-item href="/cars-home"
                    ><span>Home</span><i class="fas fa-chevron-right"></i
                ></b-nav-item>
                <b-nav-item href="/company" active
                    ><span>About us</span></b-nav-item
                >
            </b-nav>
            <h1
                class="title__top"
                data-aos="fade-up"
                data-aos-duration="1800"
            >
                The Mercedes-Benz AG at a glance.
            </h1>
            <div class="glance__body">
                <b-row>
                    <b-col
                        xl="4"
                        lg="12"
                        md="12"
                        v-for="(item,index) in items"
                        :key="index"
                    >
                        <p
                            class="title__top"
                            data-aos="fade-up"
                            data-aos-duration="1500"
                        >
                            {{ item.text }}
                        </p>
                    </b-col>
                </b-row>
            </div>

            <h2
                class="title__bottom"
                data-aos="fade-up"
                data-aos-duration="1800"
            >
                Our business divisions.
            </h2>
        </b-container>
    </section>
</template>
<script>
export default {
    data() {
        return {
            items: [
            ],
        };
    },
    methods: {
        async getDataApi() {
            const url = "/api/intro-glance";
            const response = await fetch(url);
            const data = await response.json();
            return data;
        },
    },
    async created() {
        this.items = await this.getDataApi();
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap");

#glance__intro {
    max-width: 1680px;
    height: 827px;
    background: #fff;
    color: #000000;
    font-family: sans-serif;
}

#glance__intro .container {
    max-width: 1265px;
}

#glance__intro h1,
#glance__intro h2,
#glance__intro p {
    margin: 0;
}

#glance__intro h1,
#glance__intro h2 {
    text-align: center;
    font-family: "Lora", serif;
    font-size: 2.42857rem;
    line-height: 3.14286rem;
    font-weight: 200;
    letter-spacing: -2px;
}

#glance__intro h1 {
    position: relative;
    top: 5.5rem;
}

#glance__intro ul.top__link {
    position: relative;
    top: 13px;
}

#glance__intro p {
    text-align: start;
    font-size: 13px;
    text-indent: 25px;
    padding: 0 30px;
    line-height: 23px;
    letter-spacing: 1px;
}

#glance__intro .top__link a span {
    color: #333;
}

#glance__intro .top__link a:hover span {
    color: #00adef;
}

#glance__intro .top__link a i {
    position: relative;
    left: 18px;
    font-size: 14px;
}

#glance__intro .top__link a i,
#glance__intro .top__link a span,
#glance__intro p {
    color: #333;
}

#glance__intro .top__link li.active span {
    color: #00adef;
}

#glance__intro .title__bottom {
    position: relative;
    top: 14.5rem;
}

#glance__intro .glance__body {
    position: relative;
    top: 10rem;
}

@media screen and (max-width: 1024px) {
    #glance__intro p {
        padding-bottom: 20px;
    }
}

@media screen and (max-width: 768px) {
    #glance__intro {
        height: 970px;
    }
    #glance__intro h1,
    #glance__intro h2 {
        font-size: 1.8rem;
    }
}

@media screen and (max-width: 600px) {
    #glance__intro {
        height: 1150px;
    }
}

@media screen and (max-width: 480px) {
    #glance__intro {
        height: 1450px;
    }
    #glance__intro h1,
    #glance__intro h2 {
        font-size: 1.5rem;
    }
}

@media screen and (max-width: 380px) {
    #glance__intro {
        height: 1550px;
    }
}
@media screen and (max-width: 280px) {
    #glance__intro {
        height: 2100px;
    }
}
</style>
