
<template>
    <div class="container py-5">
        <div class="row type">
            <!-- Các Loại xe -->
            <div class="col-md-3 pt-2">
                <p> <a href="#" class="text-muted h5 box" v-for="itemSubgroup in data_subgroup" :key="itemSubgroup.id">
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 77.9 25.5"
                        class="dh-io-vmos_3DKIy size"
                    >
                        <path
                            d="M12.559 14.698c-3.01 0-5.401 2.391-5.401 5.401S9.549 25.5 12.559 25.5s5.401-2.391 5.401-5.401c-.089-3.01-2.479-5.401-5.401-5.401zm0 8.766c-1.859 0-3.453-1.505-3.453-3.453 0-1.859 1.505-3.453 3.453-3.453s3.453 1.505 3.453 3.453c-.088 1.947-1.593 3.453-3.453 3.453z"
                        ></path>
                        <circle cx="12.559" cy="20.099" r="2.479"></circle>
                        <path
                            d="M76.66 13.193l-.885-3.984.443-1.505-7.083-1.151S58.333 1.152 56.209.887C49.215.002 40.361-.353 34.163.976c0 0-2.922 1.062-11.156 6.817 0 0-13.458.885-18.416 2.745l-2.036.797-2.125 3.01.177 2.125-.62.708s.443 3.896.354 3.896l5.666.974h.177a7.38 7.38 0 01-.266-1.948c0-3.63 3.01-6.64 6.64-6.64s6.64 3.01 6.64 6.64c0 .708-.089 1.328-.266 1.948h37.806a6.911 6.911 0 01-.266-1.948c0-3.63 3.01-6.64 6.64-6.64s6.64 3.01 6.64 6.64c0 .443 0 .797-.089 1.151h.266l7.526-1.24.443-5.755c.002 0-.529-.443-1.238-1.063zM5.034 14.521l-3.01 1.151s.62-2.125 2.036-3.01c.796-.443 3.541-1.062 3.541-1.062l-2.567 2.921zm57.992-5.578c-6.64.708-14.874.531-30.191 1.328-5.578.266-10.005.443-10.713.531-3.01.266-9.031.354-10.89.62 2.302-.885 7.88-1.417 12.395-1.594 5.047-3.719 9.562-6.552 10.89-6.906 1.417-.443 4.515-1.062 8.677-.974l-.62 7.083c.885 0 2.568-.089 2.656-.089l.62-6.817c2.479.089 7.968.354 10.447.885l-.443 5.578c.266 0 1.417 0 1.859-.089l.443-5.047c4.692 2.125 7.614 5.312 7.614 5.312 0-.086-1.062.002-2.744.179z"
                        ></path>
                        <path
                            d="M63.026 14.698c-3.01 0-5.401 2.391-5.401 5.401s2.391 5.401 5.401 5.401 5.401-2.391 5.401-5.401-2.391-5.401-5.401-5.401zm0 8.766c-1.859 0-3.453-1.505-3.453-3.453 0-1.859 1.505-3.453 3.453-3.453 1.859 0 3.453 1.505 3.453 3.453 0 1.947-1.594 3.453-3.453 3.453z"
                        ></path>
                        <circle cx="63.026" cy="20.099" r="2.479"></circle>
                        </svg>
                            <span> {{itemSubgroup.subgroup_name}}</span>
                    </a>
                </p>

            </div>
            <!-- Hiển thị sản phẩm -->
            <div class="col-md-9">
                <div class="product-main">
                    <div class="row gy-2">
                        <div class="col-lg-4 d-flex justify-content-center" v-for="item in data" :key="item.id">
                            <div
                            class="card my-2 overflow-hidden"
                            style="width: 30rem; height: 100%"
                            >
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{item.name}}</h5>
                                    <!-- Car name !-->
                                    <p class="card-text text-center">{{item.price_description}}</p>
                                    <svg
                                    id="amg_svg__icon-amg"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xml:space="preserve"
                                    x="0"
                                    y="0"
                                    viewBox="0 0 79 8"
                                    width="100"
                                    height="7"
                                    class="dh-io-vmos_2MTsP d-block mx-auto"
                                    >
                                    <path
                                        d="M78.048 3.413a.456.456 0 00-.447-.446h-7.353a.456.456 0 00-.447.446v.639c0 .239.208.462.447.462h4.626c.303 0 .287.144.287.495v.08c0 .35.016.43-.287.43h-9.396a.456.456 0 01-.446-.447V2.36c0-.239.191-.446.447-.446H77.602c.238 0 .446-.207.446-.447V.447A.456.456 0 0077.6 0H62.672a.456.456 0 00-.447.447v6.635c0 .24.207.447.446.447H77.601c.24 0 .447-.208.447-.447V3.35M54.026 5.248c-.208.127-.351.255-.606.255H51.52c-.239 0-.398-.128-.606-.255l-3.652-2.313c-.208-.128-.383-.032-.383.207v3.94c0 .24-.208.447-.447.447h-1.898a.456.456 0 01-.447-.447V.447c0-.24.208-.447.447-.447h2.042c.239 0 .398.112.606.24L52.16 3.46a.553.553 0 00.622 0L57.758.24c.208-.127.351-.239.606-.239h2.042c.24 0 .447.207.447.447v6.635c0 .24-.208.447-.447.447h-1.898a.456.456 0 01-.447-.447V3.158c0-.239-.175-.335-.382-.207l-3.653 2.297zM32.556 1.914c-.128 0-.24.096-.32.207l-1.18 1.516c-.08.111-.031.207.096.207h8.486c.271 0 .287-.096.287-.367V2.425c0-.367.016-.495-.287-.495h-7.082v-.016zM27.61 7.53h-2.456c-.192 0-.272-.176-.176-.335l5.328-6.89C30.434.143 30.61 0 30.8 0h11.437c.303 0 .495.255.495.558v6.524c0 .24-.208.447-.447.447H40.372a.456.456 0 01-.447-.447v-.94c0-.272-.032-.368-.287-.368H29.621c-.192 0-.32.128-.447.287l-.032.032-.765.99c-.192.238-.463.446-.702.446h-.064zM22.587 7.529c.239 0 .51-.192.701-.447l5.12-6.635C28.6.207 28.505 0 28.266 0h-1.02c-.192 0-.368.128-.495.303l-5.328 6.89c-.08.16 0 .336.176.336h.989zM19.013 7.529c.24 0 .51-.192.702-.447l5.12-6.635c.192-.24.096-.447-.143-.447H23.24c-.19 0-.366.128-.494.303l-5.328 6.89c-.08.16 0 .336.176.336h1.42zM13.175 7.529c-.191 0-.27-.176-.175-.335l5.328-6.89c.127-.16.303-.304.494-.304h2.122c.239 0 .335.207.143.447l-5.136 6.635c-.191.24-.463.447-.702.447h-2.074zM8.31 7.529c-.191 0-.27-.176-.175-.335l5.312-6.89c.127-.16.303-.304.494-.304h2.855c.24 0 .335.207.144.447l-5.12 6.635c-.192.24-.463.447-.702.447H8.31zM.319 7.529c-.191 0-.271-.176-.175-.335L5.455.304C5.583.143 5.775 0 5.95 0h6.237c.239 0 .334.207.143.447L7.226 7.082c-.192.24-.463.447-.702.447H.319z"
                                    ></path>
                                    </svg>
                                </div>
                                <div class="car-image">
                                    <div class="front-image">
                                    <img
                                        class="dh-io-vmos_2p2ii dh-io-vmos_1qzBt"
                                        :src="item.image_front"
                                        srcset="
                                        https://assets.oneweb.mercedes-benz.com/iris/iris.jpg?COSY-EU-100-1713d0VXqrEFqtyO67PobzIr3eWsrrCsdRRzwQZg9pZbMw3SGtGyItsd2HVcUfpO6XGEubYJ0l36xOB2sr%25bApUAbI5uGQMQC3aM1kzNHTnm7j8hohKVi%25E%25vqmUjyLRhnmYaxU0drH1Gm%25n8w7OcoiZKiEM4FvSlTg9Lte6PDarsSeWHthtsd8B3cUfD%25kXGE5YrJbXSqxVKnn8wPbIoTnlR4M6oeIlTg9vx96PDK1RSeWgeRtsdPvQcUfeFfXGE1zrJ0lBYrOB2A85bAp5tlI5uCQ2QCPFi2J%25xVZkFPsgGvx3MkNulKKqD%25WjcNWmtdDZGZMuMapgeLlHp7RKWONW&amp;imgt=P27&amp;bkgnd=9&amp;pov=BE040&amp;im=Crop,rect=(360,250,1280,580);Resize,width=600 2x
                                        "
                                        alt="Mặt trước"
                                    />
                                    </div>
                                    <div class="back-image">
                                    <img
                                        class="dh-io-vmos_2p2ii dh-io-vmos_1qzBt"
                                        :src="item.image_back"
                                        srcset="
                                        https://assets.oneweb.mercedes-benz.com/iris/iris.jpg?COSY-EU-100-1713d0VXqrEFqtyO67PobzIr3eWsrrCsdRRzwQZg9pZbMw3SGtGyItsd2HVcUfpO6XGEubYJ0l36xOB2sr%25bApUAbI5uGQMQC3aM1kzNHTnm7j8hohKVi%25E%25vqmUjyLRhnmYaxU0drH1Gm%25n8w7OcoiZKiEM4FvSlTg9Lte6PDarsSeWHthtsd8B3cUfD%25kXGE5YrJbXSqxVKnn8wPbIoTnlR4M6oeIlTg9vx96PDK1RSeWgeRtsdPvQcUfeFfXGE1zrJ0lBYrOB2A85bAp5tlI5uCQ2QCPFi2J%25xVZkFPsgGvx3MkNulKKqD%25WjcNWmtdDZGZMuMapgeLlHp7RKWONW&amp;imgt=P27&amp;bkgnd=9&amp;pov=BE140&amp;im=Crop,rect=(290,250,1280,580);Resize,width=600 2x
                                        "
                                        alt="Mặt sau"
                                    />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: "Product.vue",
  data() {
    return {
      data_subgroup: [],
      img_frontFace: true,
      img_backFace: false,
      data: [],
    };
  },
  methods: {
    async getDataSubgroup() {
      const url = "/api/all-subgroup";
      const reponse = await fetch(url);
      const data = await reponse.json();
      console.log(data);
      return data;
    },
    async getData() {
      const url = "/api/all-cars";
      const response = await fetch(url);
      const data = await response.json();
      return data;
    },
  },
  async created() {
    this.data = await this.getData();
    this.data_subgroup = await this.getDataSubgroup();
  },
};
</script>

<style scoped>
.size {
  width: 50px;
  height: 30px;
}
.center {
  text-align: center;
}
.col-md-3 a {
  text-decoration: none;
}
.col-md-3 p {
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
}

.col-md-3 .box:focus {
  font-size: 1.5rem;
  fill: black;
  color: black !important;
  position: relative;
}
.col-md-3 .box:focus::before {
  content: "";
  position: absolute;
  top: 25%;
  left: -30px;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtio81g27eHB9hRmugVQlCXTsbZ05MVDlYclahMQHxH2uj45grCtwCPomj332LnfA_lgc&usqp=CAU);
  background-size: cover;
}
.type {
  flex-direction: row;
}
@media all and (max-width: 600px) {
  .col-md-3 .box:focus::before {
    display: none;
  }
  .col-md-3 p {
    display: block;
  }
  .col-md-3 {
    display: flex;
    flex-wrap: wrap;
    align-content: flex-start;
    justify-content: center;
  }
  .col-md-3 a {
    font-size: 0.6rem !important;
    margin: 0 10px !important;
  }
  .col-md-3 a:hover {
    flex-shrink: 0;
    margin: 0 10px;
    height: calc(100px + 6vw);
    width: calc(100px + 6vw);
    border: calc(4px + 0.2vw) solid transparent;
    background-origin: border-box;
    background-clip: content-box, border-box;
    background-size: cover;
    box-sizing: border-box;
    box-shadow: 0 0 5px 5px #ccff99;
    border-radius: 20%;
    position: relative;
  }

  .size {
    display: none;
  }
  .container {
    margin-top: 20px !important;
  }
}
@media all and (max-width: 990px) {
  .col-md-3 a {
    font-size: 0.8rem !important;
    margin: 0 -10px;
  }
}

/*product-main*/

.product-main {
  max-width: 100%;
  height: 100%;
  margin-left: auto;
  margin-right: auto;
}
img {
  max-width: 100%;
  object-fit: cover;
}
.car-image {
  margin-top: 5px;
  transform-style: preserve-3d;
  transition: 1s all;
  perspective: 1500px;
  position: relative;
}
.front-image {
  width: 100%;
}
.back-image {
  position: absolute;
  transform: rotateY(180deg) translateZ(85px);
  width: 100%;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}
.car-image:hover {
  background: #f1f2f6;
  transform: rotateY(180deg);
}
</style>
