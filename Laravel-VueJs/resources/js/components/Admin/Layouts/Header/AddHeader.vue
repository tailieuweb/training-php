<template lang="">
    <div>
        <!-- <h1>This is Page</h1> -->
    </div>
    <b-container class="my-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="text-align: center">
                <h3 class="font-weight-bold text-primary">Add Slides</h3>
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
                            v-model="addheader.name"
                            name="name"
                            
                        />
                    </div>

                    <div class="form-group">
                        <label for="sTitle">Link</label>
                        <input
                            type="text"
                            class="form-control"
                            id="idLink"
                            v-model="addheader.link"
                            name="link"
                        />
                    </div>
                <div class="form-group" style="text-align: center">
                        <button
                            type="submit"
                            @click.prevent="addHeader"
                            class="btn btn-primary btn-block add-button my-5"
                        >
                            Add Hedear
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
  name: "AddHeader.vue",
  data() {
    return {
      //tạo Object rỗng để lấy dữ liệu người nhập từ v-model
      addheader: {
        name: "",
        link: "",
        enabled: 1
      },

      /* Kiểm tra validate và hiển thị thông báo lỗi */
      //   check: false,
      //   errors: []
    };
  },
  methods: {
    addHeader() {
      axios
        .post("/creat-header", {
          name: this.addheader.name,
          link: this.addheader.link,
          enabled: this.addheader.enabled
        })
        .then((response) => {
           if(response.data == 'success'){
             alert('Thêm thành công');
             window.location.href = '/admin-header'
           }
        }).catch((error)=>{console.log(error.response.data)});
    },
  },
};
</script>
<style lang="">
</style>