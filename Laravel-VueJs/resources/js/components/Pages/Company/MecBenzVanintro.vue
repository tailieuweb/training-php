<template>
    <section id="mec__benz__vans">
        <b-container>
            <b-row>
                <b-col
                    xl="4"
                    lg="12"
                    md="12"
                    v-for="item in benzVans"
                    :key="item"
                >
                    <h1 data-aos="fade-up" data-aos-duration="1800">
                        {{ item.title }}
                    </h1>
                    <div
                        class="text"
                        data-aos="fade-up"
                        data-aos-duration="1800"
                        data-aos-delay="300"
                    >
                        <b-card-text>{{ item.text }}</b-card-text>
                        <b-card-text class="text02" v-if="item.load != ''">{{
                            item.text02
                        }}</b-card-text>
                        <b-card-text class="text03" v-if="item.load != ''">{{
                            item.text03
                        }}</b-card-text>
                        <b-link v-if="item.load != ''">{{ item.load }}</b-link>
                    </div>
                </b-col>
            </b-row>
            <h2 data-aos="fade-up" data-aos-duration="1800">Our strategy.</h2>
        </b-container>
    </section>
</template>
<script>
export default {
    data() {
        return {
            benzVans: [
            ],
        };
    },
     methods: {
        async getDataApi() {
            const url = "/api/company-mec-ben-vans";
            const response = await fetch(url);
            const data = await response.json();
            return data;
        },
    },
    async created() {
        this.benzVans = await this.getDataApi();
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap");

#mec__benz__vans {
    max-width: 1680px;
    height: 725px;
    background: #ffffff;
    color: #000000;
    overflow: hidden;
}

#mec__benz__vans .container {
    max-width: 1265px;
    height: 100%;
}

h1,
h2,
p,
a {
    margin: 0;
    text-decoration: none;
}

h1,
h2 {
    font-size: 2rem;
    font-family: "Lora", serif;
    letter-spacing: -1px;
    font-weight: 300;
}
h2 {
    text-align: center;
    position: relative;
    top: 15.5rem;
}

p {
    font-size: 13px;
    font-weight: 400;
    letter-spacing: 1px;
    line-height: 20px;
    text-align: start;
    font-family: sans-serif;
}

.row {
    position: relative;
    top: 55px;
}

a {
    width: 110px;
    height: 45px;
    color: #fff;
    background: #00adef;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    top: 30px;
}
a:hover {
    background: #0088c6;
    color: #fff;
}

.text {
    padding: 0 30px;
}
.card-text:last-child {
    text-indent: 25px;
}

@media screen and (max-width: 1024px) {
    #mec__benz__vans {
        height: 695px;
    }

    #mec__benz__vans .container {
        max-width: 960px;
    }
    p {
        padding-bottom: 20px;
    }
    a {
        top: 10px;
    }
    h1 {
        padding: 0 30px;
    }
    h2 {
        top: 9.5rem;
    }
}

@media screen and (max-width: 768px) {
    #mec__benz__vans {
        height: 740px;
    }
    #mec__benz__vans .container {
        max-width: 720px;
    }
}

@media screen and (max-width: 600px) {
    #mec__benz__vans {
        height: 830px;
    }
    h1 {
        font-size: 1.7rem;
    }
    #mec__benz__vans .container {
        max-width: 480px;
    }
}

@media screen and (max-width: 480px) {
    #mec__benz__vans {
        height: 930px;
    }

    #mec__benz__vans .container {
        max-width: 380px;
    }
    a {
        width: 100%;
    }
}

@media screen and (max-width: 380px) {
    #mec__benz__vans {
        height: 930px;
    }

    #mec__benz__vans .container {
        max-width: 365px;
    }
}

@media screen and (max-width: 280px) {
    #mec__benz__vans {
        height: 1050px;
    }
    h1 {
        font-size: 1.3rem;
    }
    #mec__benz__vans .container {
        max-width: 280px;
    }

    h1,
    .text {
        padding: 0 15px;
    }
}
</style>
