  <template>
  <div id="header">
    <h1>This is admin header page</h1>
    <div class="card-body">
      <a
        href="/admin-addheader"
        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2"
        style="color: white"
        ><i class="fa fa-plus fa-sm text-white-50" aria-hidden="true"></i>
        Add
      </a>
      <table class="table">
        <thead>
          <tr>
            <th>id</th>
            <th>name</th>
            <th>link</th>
          </tr>
          <tr v-for="item in data" :key="item.id">
            <th>{{ item.id }}</th>
            <th>{{ item.name }}</th>
            <th>{{ item.link }}</th>
            <a
              class="btn"
              href="/admin-updateheader"
              @click.prevent="updateHeader(item.id)"
            >
              <i class="far fa-edit"></i>
            </a>
             <a
              class="btn"
              @click.prevent="deleteHeader(item.id)"
            >
                 <i class="fas fa-trash-alt"></i>
            </a>
          </tr>
        </thead>
      </table>
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Thay đổi</h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <input type="hidden" name="id" />
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"
                    >Name<span style="color: red">*</span></label
                  >
                  <input
                    type="text"


                    class="form-control"
                    id="recipient-name"
                  />
                </div>
                <input type="hidden" name="id" />
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"
                    >Name<span style="color: red">*</span></label
                  >
                  <input
                    type="text"


                    class="form-control"
                    id="recipient-name"
                  />
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cancel
              </button>
              <button
                type="button"
                class="btn btn-primary"

              >
                update
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>
<script>
export default {
  data() {
    return {
      load: true,
      data: [],
    };
  },
  methods: {
    async getData() {
      const url = "/api/all-menu";
      const response = await fetch(url);
      const data = await response.json();
      return data;
    },
    updateHeader(id){
      //  window.location.href = "/admin-updateheader/" + id;
       window.location.href = "/admin-updateheader/" + btoa(id + "123");
    },
     deleteHeader(id) {
            axios
                .post("/delete-header/" + id + "", {})
                .then((response) => {
                    if (response.data == "success") {
                          alert("!!! Xóa thành công!!!");
                        window.location.href = "/admin-header";
                    }
                })
                .catch((error) => {
                  console.log(error.response.data);
                });
        },
  },

  async created() {
    this.data = await this.getData();
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

<style lang="">
</style>
