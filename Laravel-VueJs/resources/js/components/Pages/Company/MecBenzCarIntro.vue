<template>
    <section id="mec__benz__car">
        <b-container>
            <b-row>
                <b-col
                    xl="4"
                    lg="12"
                    md="12"
                    v-for="item in benzCar"
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
                        <b-link v-if="item.load != ''">{{ item.load }}</b-link>
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </section>
</template>
<script>
export default {
    data() {
        return {
            benzCar: [
            ],
        };
    },
     methods: {
        async getDataApi() {
            const url = "/api/company-mec-ben-car";
            const response = await fetch(url);
            const data = await response.json();
            return data;
        },
    },
    async created() {
        this.benzCar = await this.getDataApi();
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap");

#mec__benz__car {
    max-width: 1680px;
    height: 445px;
    background: #ffffff;
    color: #000000;
    overflow: hidden;
}

#mec__benz__car .container {
    max-width: 1265px;
}

h1,
p,
a {
    margin: 0;
    text-decoration: none;
}

h1 {
    font-size: 2rem;
    font-family: "Lora", serif;
    letter-spacing: -1px;
    font-weight: 300;
}

p {
    text-indent: 25px;
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

@media screen and (max-width: 1024px) {
    #mec__benz__car .container {
        max-width: 960px;
    }
    p {
        padding-bottom: 20px;
    }
    a {
        top: 10px;
    }
}

@media screen and (max-width: 768px) {
    #mec__benz__car {
        height: 490px;
    }
    #mec__benz__car .container {
        max-width: 720px;
    }
}

@media screen and (max-width: 600px) {
    #mec__benz__car {
        height: 620px;
    }
    h1 {
        font-size: 1.7rem;
    }
    #mec__benz__car .container {
        max-width: 480px;
    }
}

@media screen and (max-width: 480px) {
    #mec__benz__car {
        height: 680px;
    }

    #mec__benz__car .container {
        max-width: 380px;
    }
    a {
        width: 100%;
    }
}

@media screen and (max-width: 380px) {
    #mec__benz__car {
        height: 810px;
    }

    #mec__benz__car .container {
        max-width: 300px;
    }
}

@media screen and (max-width: 280px) {
    #mec__benz__car {
        height: 1050px;
    }
    h1 {
        font-size: 1.3rem;
    }
    #mec__benz__car .container {
        max-width: 230px;
    }
}
</style>
