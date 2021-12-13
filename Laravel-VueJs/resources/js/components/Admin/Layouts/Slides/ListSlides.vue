<template>
    <b-container class="my-3">
        <div class="card shadow mb-4">
            <div class="card-header py-4" style="text-align: center">
                <h3 class="m-0 font-weight-bold text-primary">Quản Lý Slide</h3>
            </div>
            <div class="card-header link-header py-2">
                <b-link class="font-weight-bold text-primary" href="/home"
                    ><i class="fas fa-angle-double-left"></i> Quay lại</b-link
                >
                <b-link class="font-weight-bold text-primary" href="/cars-home"
                    >View page <i class="fas fa-angle-double-right"></i
                ></b-link>
            </div>

            <div class="card-body">
                <a
                    href="/slides/add-slides"
                    class="
                        d-none d-sm-inline-block
                        btn btn-sm btn-primary
                        shadow-sm
                        mb-2
                    "
                    style="color: white"
                    ><i
                        class="fa fa-plus fa-sm text-white-50"
                        aria-hidden="true"
                    ></i>
                    Thêm mới slide</a
                >
                <small class="d-block text-danger"
                    ><b>Lưu ý:</b> Bắt buộc phải có 6 slide được hiển thị</small
                >
                <table class="table">
                    <thead>
                        <tr>
                            <th width="50">STT</th>
                            <th width="220">Hình Ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Tên link</th>
                            <th>Mô tả 1</th>
                            <th>Mô tả 2</th>
                            <th width="110">Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="cmsSlideInAdmin">
                        <tr class="show-info" v-for="(item, index) in slides" :key="index">
                            <td>
                                <p>{{ index + 1 }}</p>
                            </td>
                            <td>
                                <img :src="'/' + item.image" alt="" />
                            </td>
                            <td>
                                <p>{{ item.title }}</p>
                            </td>
                            <td>
                                <p>{{ item.btn_text }}</p>
                            </td>
                            <td>
                                <p v-if="item.des_1">{{ item.des_1 }}</p>
                                <p v-else style="color: crimson">Null</p>
                            </td>
                            <td>
                                <p v-if="item.des_2">{{ item.des_2 }}</p>
                                <p v-else style="color: crimson">Null</p>
                            </td>
                            <td class="action">
                                <a href="/update-slides" class="edit" @click.prevent="updateSlide(item.id)">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <a href="#" class="delete" @click.prevent="deleteSlides(item.id)" >
                                    <!-- bắt sự kiện -->
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </b-container>
</template>
<script>
export default {
    name: "ListSlide",
    data() {
        return {
            load: true,
            itemClass: "carousel-item",
            slides: [],
            check: null,
        };
    },
    methods: {
        async getDataApi() {
            const url = "/api/slides";
            const response = await fetch(url);
            const data = await response.json();
            return data;
        },
        updateSlide(id) {
            window.location.href = "/update-slides/" + btoa(id + "123");
        },
        deleteSlides(id) {
            axios
                .post("/delete-slides/" + id + "", {})
                .then((response) => {
                    this.check = true;
                    if (response.data == "error") {
                        alert("!!! Bạn không thể xóa khi còn 6 slide !!!");
                    } else {
                        alert("!!! Xóa thành công!!!");
                        window.location.href = "/admin/slides";
                    }
                })
                .catch((error) => {
                    this.check = false;
                });
        },
    },
    async created() {
        this.slides = await this.getDataApi();
    },
    mounted() {
        //Check expire token of user
        var user = JSON.parse(localStorage.getItem("user"));
        if (user == null) {
            this.load = false;
            window.location.href = "/login";
        }
    },
};
</script>
<style scoped>
.link-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

a {
    text-decoration: none;
}

td {
    position: relative;
    height: 100px;
    overflow: auto;
}
img {
    width: 200px;
    position: absolute;
}
.show-info p {
    position: absolute;
    overflow: auto;
    margin-bottom: 0;
    padding-bottom: 10px;
}

.show-info td::-webkit-scrollbar {
    width: 10px;
    height: 8px;
    cursor: pointer;
}

.show-info td::-webkit-scrollbar-track {
    background: #c4c4c4c4;
    border-radius: 10px;
}

.show-info td::-webkit-scrollbar-thumb {
    background: #aaaaaa;
    padding: 5px 0;
    border-radius: 10px;
}

.action {
    display: flex;
    justify-content: space-around;
}
.alert {
    position: fixed;
    z-index: 10;
    width: 30%;
    left: 34%;
    top: -150px;
    box-shadow: 10px 10px 15px rgb(0 0 0 / 30%);
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: down 3s ease-in;
    animation-iteration-count: 1;
}

@keyframes down {
    0% {
        top: -100px;
    }
    20% {
        top: 10px;
    }
    30% {
        top: 14px;
    }
    40% {
        top: 10px;
    }
    50% {
        top: 14px;
    }
    60% {
        top: 10px;
    }
    90% {
        top: 20px;
    }
    100% {
        top: -100px;
    }
}
</style>
