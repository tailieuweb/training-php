<template>
    <b-container class="my-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="text-align: center; color: black">
                <h3 class="font-weight-bold ">Update Footer</h3>
            </div>
            <div class="card-header link-header py-2">
                <b-link
                    class="font-weight-bold "
                    href="/admin/footer" style="color: black"
                    ><i class="fas fa-angle-double-left"></i>List Footer</b-link   >
            </div>
            <div class="card-body">
                <form name="myFormAcc" method="post">
                    <!-- Hiên thị thông báo lỗi khi người dùng nhập sai -->
                    <a href="/admin/footer" class="alert alert-success text-center" v-if="check">
                        <span>!!! Sửa Footer thành công !!! Click để trở về </span>
                    </a>
                    <div
                        class="error alert alert-danger text-center shadow"
                        v-if="errors.length" >
                        <span v-for="(err, index) of errors" :key="index">
                            {{ err }}
                        </span>
                    </div>   
                    <div class="form-group">
                        <label for="upSubFooter">Update subfooter</label>
                        <input
                            type="text"
                            class="form-control"
                            id="upSubFooter"
                            name="subfooter" ref="upSubFooter"
                               v-model="footer.subfooter"/>
                    </div>

                    <div class="form-group" style="text-align: center">
                        <button
                            type="submit"
                            @click.prevent="updateFooter"
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
    name: "UpdateFooter.vue",
    data() {
        return {
            footer: {
                topics: "",
                subfooter: "",
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
        current_url = "/api/footer-id/" + value_indexOf;
        axios.get(current_url).then((response) => {
            if (response.data.id) {
                this.footer = response.data;
            }
        });
    },
    methods: {
        updateFooter() {
            axios
                .post("/update-footer/" + this.footer.id, {
                    topics: this.footer.topics,
                    subfooter: this.footer.subfooter,
                  
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