<template>
  <div class="modal fade" id="addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            New Post Edit - Innovation page
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
          ></button>
        </div>
        <form action="" method="post" v-for="item in sectionArticlePost" :key="item.id">
          <div class="modal-body">
            <div class="form-group">
              <h3>Image</h3>
              <img class="imageOld" ref="imageOld" :src="'/' + item.image_article" alt="" />
              <!-- thông báo lỗi khi ảnh đã tồn tại !-->
              <div v-if="errorExistsImage != null">
                <p>{{ errorExistsImage }}</p>
              </div>
              <!-- thông báo lỗi khi sai validation !-->
              <div v-if="error.length > 0">
                <p v-for="errorItem in error" :key="errorItem">
                  {{ errorItem.image }}<br />{{ errorItem.type_post }}
                </p>
              </div>
              <input type="file" @change="changeFile" ref="image" class="form-control" name="image" id="img" />
              <h3>Title</h3>
              <input type="text" name="title" ref="title" :value="item.title_article" class="form-control" />
              <h3>Sub title</h3>
              <input type="text" name="subtitle" ref="subtitle" class="form-control" :value="item.subtitle_article" />
              <h3>Type post</h3>
              <select ref="type_post" class="form-control" name="type_post">
                <option
                  :selected="categoryItem.id == item.category_post_id"
                  v-for="categoryItem in categoryArticlePost"
                  :key="categoryItem.id"
                  :value="categoryItem.id"
                >
                  {{ categoryItem.category_post_name }}
                </option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close </button>
            <button  type="submit"  class="btn btn-primary"  @click.prevent="updateSection(item.id)" >
              Save changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ModalAdd",
  data() {
    return {
      title: String,
      categoryArticlePost: [],
      subtitle: String,
      type_post: Number,
      image: String,
      imageOld: String,
      pathImageNew: String,
      error: [],
      errorExistsImage: "",
    };
  },
  props: {
    sectionArticlePost: Object,
  },
  methods: {
    async updateSection(id) {
      /**Thực hiện cắt chuỗi lấy tên ảnh hiển thị trên modal */
      var indexOfImage = this.$refs.imageOld.src.lastIndexOf("/");
      var subStrImageOld = this.$refs.imageOld.src.substr(indexOfImage + 1);
      /**end */
      const formData = new FormData();
      formData.set("image", this.image);
      formData.set("title", this.$refs.title.value);
      formData.set("subtitle", this.$refs.subtitle.value);
      formData.set("type_post", this.$refs.type_post.value);
      formData.set("imageOld", subStrImageOld);
      axios
        .post("/api/update-section-article-post-id/" + id, formData)
        .then((response) => {
          if (response.data.exists_image) {
            this.errorExistsImage = response.data.exists_image;
          } else if (response.data.error) {
            this.error.push(response.data.error);
          } else if (!response.data.exists_image && !response.data.error) {
            window.location.href = "/admin/innovation?notice=success";
          }
        });
      this.error = [];
      this.errorExistsImage = null;
    },
    changeFile(e) {
      //Khi người dùng chọn ảnh thì hàm sẽ được thực thi
      this.image = e.target.files[0];
      var t = this.image.type.split("/").pop().toLowerCase();
      if ( t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif" && t != "webp" ) {
        alert("Please select a valid image file");
        document.getElementById("img").value = "";
        return false;
      }
      return true;
    },
  },
  async mounted() {
    const url = "/api/all-category-article-post-innovation";
    const response = await fetch(url);
    const data = await response.json();
    this.categoryArticlePost = data;
  },
};
</script>

<style scoped>
.imageOld {
  width: 250px;
  height: 300px;
  object-fit: cover;
}
</style>
