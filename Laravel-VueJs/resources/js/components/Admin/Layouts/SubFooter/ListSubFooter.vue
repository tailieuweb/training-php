<template>
    <b-container class="my-3">
        <div class="card shadow mb-4">
            <div class="card-header py-4" style="text-align: center; text-transform: uppercase">
                  <h1 class="title">list</h1>
            </div>
            <div class="card-header link-header py-2">
                <b-link class="font-weight-bold" style="color: black" href="/home">
                <i class="fas fa-angle-double-left"  ></i> Quay lại</b-link>
                <b-link class="font-weight-bold" style="color: black" href="/cars-home">View Page <i class="fas fa-angle-double-right"></i>
                </b-link>
            </div>

            <div class="card-body">
                <a href="/subfooter/add-subfooter"
                    class=" d-none d-sm-inline-block btn btn-sm  shadow-sm mb-2" style="color: white; background:#333333">
                    <i class="fa fa-plus fa-sm text-white-50" aria-hidden="true"></i> Add</a>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Link</th>
                        <th scope="col">Footer</th>
                        </tr>
                    </thead>
                    <tbody id="AdminSubFooter">
                        <tr  class="show-info"
                            v-for="(item, index) in subfooter" :key="index"  >
                            <td>
                                <p>{{ index + 1 }}</p>
                            </td>
                            <td>
                                <p>{{ item.name }}</p>
                            </td>
                            <td>
                                <p>{{ item.link }}</p>
                            </td>
                            <td>
                                <p>{{ item.footer_id}}</p>
                            </td>
                            <td class="action">
                                <a
                                    href="/update-subfooter"
                                    class="edit"
                                    @click.prevent="updateSubFooter(item.id)" >
                                    <i class="fas fa-user-edit" style="color: #333333"></i>
                                </a>
                                <a
                                    href="#"
                                    class="delete"
                                    @click.prevent="deleteSubFooter(item.id)"  >
                                    <!-- bắt sự kiện -->
                                    <i class="fas fa-trash-alt" style="color: #333333"></i>
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
    name: "ListSubFooter.vue",
    data() {
        return {
            load: true,
            subfooter: [],
            check: null,
        };
    },
     props : {

    },
    methods: {
        async getDataApi() {
            const url = "/api/all-subfooter";
            const response = await fetch(url);
            const data = await response.json();
            return data;
        },
       //update
       updateSubFooter(id) {
            window.location.href = "/update-subfooter/" + btoa(id + "123");
            // window.location.href = "/update-subfooter/" +id ;
        },
        deleteSubFooter(id) {
            axios
                .post("/delete-subfooter/" + id + "", {})
                .then((response) => {
                    this.check = true;
                     window.location.href = "/admin/subfooter";
                })
                .catch((error) => {
                    this.check = false;
                });
        },
       //delete

    },
    async created() {
        this.subfooter = await this.getDataApi();
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
h1{
    font-size: 50px;
}
a {
    text-decoration: none;
}
td {
    position: relative;
    height: 100px;
    overflow: auto;
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

</style>