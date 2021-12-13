<template>
    <div id="category">
        <h1>This is admin category page</h1>
        <div class="card-body">
            <a
                href="/admin/add-category"
                data-toggle="modal"
                data-target="#exampleModal"
                class="
                    d-none d-sm-inline-block
                    btn btn-sm btn-primary
                    shadow-sm
                    mb-2
                "
                style="color: white"
                ><i
                    class="fa fa-plus fa-sm text-white-50"
                    aria-hidden="true"></i>
                Add
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã SP</th>
                        <th>Loại sản phẩm</th>
                        <th>Trạng thái</th>
                        <th>Thao Tác</th>
                    </tr>
                     <tr v-for="itemSubgroup in data_subgroup" :key="itemSubgroup.id">
                        <th class="id-subgroup">{{itemSubgroup.id}}</th>
                        <th>{{itemSubgroup.subgroup_name}}</th>
                        <th>{{itemSubgroup.status}}</th>
                        <button type="button" class="btn" @click.prevent="editGetSubGroup(itemSubgroup.id)" data-toggle="modal" data-target="#exampleModal"><i class="far fa-edit"></i></button>
                        <button type="button" class="btn" @click.prevent="deleteSubGroup(itemSubgroup.id)"><i class="fas fa-trash-alt"></i></button>
                        
                    </tr>
                </thead>
            </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thay đổi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" name="id" />
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Loại xe<span style="color: red">*</span></label>
            <input type="text" v-model="subgroup.subgroup_name" name="subgroup_name" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Trạng thái<span style="color: red">*</span></label>
            <select class="form-control" id="inputOrigin" v-model="subgroup.status">
            <option>Trống</option>
            <option>Tồn</option>
          </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" v-if="this.subgroup.id" @click.prevent="edit()">update</button>
         <button type="button" class="btn btn-primary" v-else @click.prevent="add()">Thêm mới</button>
      </div>
    </div>
  </div>
</div>
        </div>        
    </div>
</template>
<script>
export default {
    name: "EditSubGroup.vue",
  data() {
    return {
      data_subgroup: [],
      subgroup: {
                subgroup_name: "",
                status: "",

            },
    };
  },
  methods: {
    editGetSubGroup(id){
    var current_url = "/api/subgroup-id/" + id;
    axios.get(current_url).then((response) => {
      if (response.data.id) {
        this.subgroup = response.data;
      }
    }) .catch((error) => {
                console.log(error.response.data);
            })
    },
     add() {
       if(!this.subgroup.id){
          axios
                .post("/create-category", {
                    subgroup_name: this.subgroup.subgroup_name,
                    status: this.subgroup.status,
                   
                })
                .then((response) => {
                    console.log(response.data);
                    window.location.href = "/admin/category";
                })
                .catch((error) => {
                    console.log(error.response.data);
                })
       }
           
        },
    async getDataSubgroup() {
      const url = "/api/all-subgroup";
      const reponse = await fetch(url);
      const data = await reponse.json();
      return data;
    },
    deleteSubGroup(id) {
     // let data = JSON.parse(localStorage.getItem("user"));
        axios.post("/delete-subgroup/" + id + "", {}).then((response) => {
        console.log(response.data);
        window.location.href = "/admin/category";
      })
         .catch((error) => {
                console.log(error.response.data);
                
            })
    },
    edit(){
      if(this.subgroup.id){
        axios
            .post("/subgroup-id/" + this.subgroup.id, {
                subgroup_name: this.subgroup.subgroup_name,
                status: this.subgroup.status,
                   
            })
            .then((response) => {
                console.log(response.data);
                console.log("id"+  this.subgroup.id);
                 console.log(this.subgroup.subgroup_name);
                console.log(this.subgroup.status);
               // window.location.href = "/admin/category";
            })
            .catch((error) => {
                console.log(error.response.data);
            })
             window.location.href = "/admin/category";
      }
      }
       
  },
  
  async created() {
    this.data_subgroup = await this.getDataSubgroup();
  },
}
</script>
<style scoped>
#category .edit-category{
    text-decoration: none;
    color: black;
}
#category{
    padding: 20px 70px;
    background: #f8f9fc;
    height: 694px;
}
.card-body{
  background: white;
}
h1{
  text-align: center;
}
</style>