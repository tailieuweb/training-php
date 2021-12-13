<template>
    <b-container class="my-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="text-align: center; color: black">
                <h3 class="font-weight-bold ">Update SubFooter</h3>
            </div>
            <div class="card-header link-header py-2">
                <b-link
                    class="font-weight-bold "
                    href="/admin/subfooter" style="color: black"
                    ><i class="fas fa-angle-double-left"></i>List SubFooter</b-link   >
            </div>
            <div class="card-body">
                <form name="myFormAcc" method="post">
                    <!-- Hiên thị thông báo lỗi khi người dùng nhập sai -->
                    <a href="/admin/subfooter" class="alert alert-success text-center" v-if="check">
                        <span>!!! Sửa SubFooter thành công !!! Click để trở về </span>
                    </a>
                    <div
                        class="error alert alert-danger text-center shadow"
                        v-if="errors.length" >
                        <span v-for="(err, index) of errors" :key="index">
                            {{ err }}
                        </span>
                    </div>
                    <!-- Kết thúc hiển thị thông báo lỗi -->
                       <div class="form-group">
                        <label for="sName">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="sName"
                            name="name"
                            v-model="subfooter.name"
                        />
                    </div>
                    <div class="form-group">
                        <label for="sLink">Link</label>
                        <input
                            type="text"
                            class="form-control"
                            id="sLink"
                            name="link"
                          v-model="subfooter.link"/>
                    </div>
                    <div class="form-group">
                                <label for="sFooter_Id">Footer</label>
                                <select
                                    class="form-control"
                                    id="sFooter_Id"
                                    name="footer_id"
                                    >
                                    <option value="1">More topics</option>
                                    <option value="2">Shopping</option>
                                    <option value="3">All about cars</option>
                                    <option value="4">discover more</option>
                                </select>
                    </div>
                    <div class="form-group" style="text-align: center">
                        <button
                            type="submit"
                            @click.prevent="updateSubFooter"
                            class="btn  btn-lg btn-block my-4" style="background:#333333; color: #fff" > Update SubFooter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </b-container>
</template>
<script>
export default {
    name: "admin-subfooter-update",
    data() {
        return {
            subfooter: {
                name: "",
                link: "",
                footer_id: "",
            },
            check: false,
            errors: [],
        };
    },
    mounted() {
       var current_url = window.location.href;
        var indexOf = current_url.lastIndexOf("/");
        var value_indexOf = atob(current_url.substr(indexOf + 1));
        value_indexOf = value_indexOf.substr(0, value_indexOf.length - 3);
        console.log(value_indexOf);
        current_url = "/api/subfooter-id/" + value_indexOf;
        axios.get(current_url).then((response) => {
            if (response.data.id) {
                this.subfooter = response.data;
                // console.log(this.slides);
            }
        });
    },
    methods: {
        updateSubFooter() {
            axios
                .post("/update-subfooter/" + this.subfooter.id, {
                    name: this.subfooter.name,
                    link: this.subfooter.link,
                    footer_id: this.subfooter.footer_id,
                  
                })
                .then((response) => {
                    (this.check = true), (this.errors = [null]);
                    this.errors.length = 0;
                })
                .catch((error) => {
                    this.check = false;
                    if (error.response.data.errors.name) {
                        this.errors = error.response.data.errors.name[0];
                    }
                    else if (error.response.data.errors.link) {
                        this.errors = error.response.data.errors.link[0];
                    }
                    else if (error.response.data.errors.footer_id) {
                        this.errors = error.response.data.errors.footer_id[0];
                    }
                });
        },
    },
};
</script>
<style scoped>
a {
    text-decoration: none;
    transition: .2s all;
}
a:hover {
    cursor: pointer;
    text-decoration: none;
    transform: scale(1.05);
}
label {
    font-weight: bold;
    margin: 10px 0;
}
textarea {
    height: 100px;
}
img {
    padding: 5px;
    border: 1px solid #c4c4c4;
    margin: 20px 0;
}
.alert-success{
    position: fixed;
    width: 83%;
    top: 10px;
    box-shadow: 10px 10px 15px rgb(0 0 0 / 30%);
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: down 1s ease-in;
    animation-iteration-count: 1;
}
@keyframes down {
    0%{
        top: -100px;
    }
    100%{
        top: 10px;
    }
}
</style>