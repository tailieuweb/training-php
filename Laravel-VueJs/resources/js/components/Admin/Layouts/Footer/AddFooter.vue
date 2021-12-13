<template>
    <b-container class="my-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="text-align: center">
                <h3 class="font-weight-bold" style="color: #333333">Add Footer</h3>
            </div>
            <div class="card-header link-header py-2">
                <b-link
                    class="font-weight-bold " style="color:#333333"
                    href="/admin/footer"
                    ><i class="fas fa-angle-double-left"></i> List Footer</b-link  >
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <!--thông báo lỗi khi người dùng nhập sai -->
                    <div class="alert alert-success text-center" v-if="check"  >
                          <a
                        href="/admin/footer"
                        class="alert alert-success text-center"
                        v-if="check"
                    >
                        <span
                            >!!! Thêm SubFooter thành công !!! Nhấn vào để trở về
                        </span>
                    </a>
                    </div>
                    <!-- end -->
                     <div class="form-group">
                                <label for="sTopics">Toppic</label>
                                <select 
                                ref="topics"
                                    class="form-control"
                                    name="topics">
                                    <option disabled value="">--- Vui lòng chọn ---</option>
                                    <option value="1">More topics</option>
                                    <option value="2">Shopping</option>
                                    <option value="3">All about cars</option>
                                    <option value="4">Discover more</option>
                                </select>
                    </div>
                    <div class="form-group">
                        <label for="writeSubFooter">Add subfooter</label>
                        <input
                            type="text"
                            class="form-control"
                            id="wrSubFooter"
                            name="subfooter" ref="wrSubFooter"
                        />
                        <button type="button" @click="writeSubFooter">Add Subfooter</button>
                    </div>
                    <div class="form-group">
                        <label for="sSubFooter">Subfooter</label>
                        <input
                            type="text"
                            class="form-control"
                            id="sSubFooter"
                            name="subfooter"
                            ref="subFooter"
                            disabled
                        />
                    </div>

                    <div class="form-group" style="text-align: center">
                        <button
                            type="submit"
                            @click.prevent="addFooter"
                            class="btn btn-block add-button my-5" style="background:#333333; color:#fff">Add SubFooter  </button>
                    </div>
                </form>
            </div>
        </div>
    </b-container>
</template>
<script>
export default {
    name: "AddFooter.vue",
    data() {
        return {
            load: true,
            footer: {
                topics: "",
                subfooter: "",
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
        writeSubFooter(){
            this.$refs.subFooter.value += this.$refs.wrSubFooter.value + ';';
        },
        async addFooter() {
            var splitSubFooter = this.$refs.subFooter.value.split(';');
            var dataFooterByID = await this.getFooterByID();
             var subFooter = JSON.parse(Array( dataFooterByID.subfooter));
            splitSubFooter.map(item => {   
                 subFooter.push({"name" : item.replace(/\s/g, "") });
                
            });
            axios
                .post("/api/create-footer/",{
                    'topics' : this.$refs.topics.value,
                    'subFooter' : subFooter
                })
                .then((response) => {
                    // window.location.href = "/admin/footer";
                    (this.check = true), (this.errors = [null]);
                    this.errors.length = 0;
                });
                
        },
        async getFooterByID(){
            const url = '/api/get-footer-by-id/' + this.$refs.topics.value;
            const response = await fetch(url);
            const data = await response.json();
            return data;
        }
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