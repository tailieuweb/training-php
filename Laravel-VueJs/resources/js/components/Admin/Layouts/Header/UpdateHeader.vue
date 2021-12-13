<template lang="">
    <div>
        <!-- <h1>This is Page</h1> -->
    </div>
    <b-container class="my-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="text-align: center">
                <h3 class="font-weight-bold text-primary">Update Menu</h3>
            </div>
            <div class="card-header link-header py-2">
                <b-link
                    class="font-weight-bold text-primary"
                    href="/admin-header"
                    ><i class="fas fa-angle-double-left"></i> Quay lại
                    Menu Main</b-link
                >
                  <div class="card-body">
                <form method="post" enctype="multipart/form-data"> 
                <div class="form-group">
                        <label for="sTitle">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="idName"
                            v-model="updateHeader.name"
                            name="name"    
                        />
                    </div>

                    <div class="form-group">
                        <label for="sTitle">Link</label>
                        <input
                            type="text"
                            class="form-control"
                            id="idLink"
                            v-model="updateHeader.link"
                            name="link"
                        />
                    </div>
                <div class="form-group" style="text-align: center">
                        <button
                            type="submit"
                            @click.prevent="update"
                            class="btn btn-primary btn-block add-button my-5"
                        >
                            Update Hedear
                        </button>
                    </div>
                
                </form>
            </div>
            </div>
        </div>
    </b-container>
</template>
<script>
export default {
  name: "UpdateHeader.vue",
  data() {
    return {
      //tạo Object rỗng để lấy dữ liệu người nhập từ v-model
      updateHeader: {
        name: "",
        link: "",
        enabled: "",
      },

      /* Kiểm tra validate và hiển thị thông báo lỗi */
      //   check: false,
      //   errors: []
    };
  },
  mounted() {
    var current_url = window.location.href;
    var indexOf = current_url.lastIndexOf("/");
    var value_indexOf = atob(current_url.substr(indexOf + 1));
    value_indexOf = value_indexOf.substr(0, value_indexOf.length - 3);
    current_url = "/api/all-menu-id/" + value_indexOf;
    axios.get(current_url).then((response) => {
      if (response.data.id) {
        this.updateHeader = response.data;
      }
    });
  },
  methods: {
      update(){
           axios
        .post("/update-header/"+this.updateHeader.id, {
          name: this.updateHeader.name,
          link: this.updateHeader.link,
          enabled: this.updateHeader.enabled
        })
        .then((response) => {
           if(response.data == 'success'){
             alert('Update thành công');
             window.location.href = '/admin-header'
           }
        //    console.log(response.data);
        }).catch((error)=>{console.log(error.response.data)});
      }
  },
};
</script>
<style lang="">
</style>