<template>
    <b-container class="my-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="text-align: center">
                <h3 class="font-weight-bold" style="color: #333333">Add SubFooter</h3>
            </div>
            <div class="card-header link-header py-2">
                <b-link
                    class="font-weight-bold " style="color:#333333"
                    href="/admin/subfooter"
                    ><i class="fas fa-angle-double-left"></i> List SubFooter</b-link  >
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <!-- Hiên thị thông báo lỗi khi người dùng nhập sai -->
                    <div class="alert alert-success text-center" v-if="check"
                        ><span>!!! Thêm SubFooter thành công !!!</span></div>
                    <div  class="error alert alert-danger text-center shadow" v-if="errors.length">
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
                          v-model="subfooter.link"
                        />
                    </div>
                    <div class="form-group">
                                <label for="sFooter_Id">Footer</label>
                                <select
                                    class="form-control"
                                    id="sFooter_Id"
                                    name="footer_id">
                                    <option value="1">More topics</option>
                                    <option value="2">Shopping</option>
                                    <option value="3">All about cars</option>
                                    <option value="4">Discover more</option>
                                </select>
                    </div>
                    <div class="form-group" style="text-align: center">
                        <button
                            type="submit"
                            @click.prevent="addSubFooter"
                            class="btn btn-block add-button my-5" style="background:#333333; color:#fff">Add SubFooter  </button>
                    </div>
                </form>
            </div>
        </div>
    </b-container>
</template>
<script>
export default {
    data() {
        return {
            load: true,
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
        //Check expire token of user
        var user = JSON.parse(localStorage.getItem("user"));
        if (user == null) {
            this.load = false;
            window.location.href = "/login";
        }
    },
    methods: {
        addSubFooter() {
            axios
                .post("/create-subfooter", {
                    name: this.subfooter.name,
                    link: this.subfooter.link,
                    footer_id: this.subfooter.footer_id,
                   
                })
                .then((response) => {
                    // console.log(response.data);
                    (this.check = true), (this.errors = [null]);
                    this.errors.length = 0;
                })
                .catch((error) => {
                    // console.log(error.response.data);
                    this.check = false;
                    // console.log(error.response.data.errors.title);
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
}
label {
    font-weight: bold;
    margin: 10px 0;
}
</style>