<template>
  <div>
    <b-card bg-variant="light">
      <b-form-group
        label-cols-lg="3"
        label="Mercedes topics - Innovation page"
        label-size="lg"
        label-class="font-weight-bold pt-0"
        class="mb-0"
      >
        <form action="" method="post">
          <b-form-group
            label="Image:"
            label-for="nested-image"
            label-cols-sm="3"
            label-align-sm="right"
          >
            <input type="file" @change="changeFile" name="image" id="img" />
          </b-form-group>

          <b-form-group
            label="Title:"
            label-for="nested-title"
            label-cols-sm="3"
            label-align-sm="right"
          >
            <!-- <b-form-input id="nested-city" name="title" ref="title"></b-form-input> -->
            <input
              type="text"
              class="form-control"
              name="title"
              ref="title"
              id=""
            />
          </b-form-group>

          <b-form-group
            label="Subtitle:"
            label-for="nested-subtitle"
            label-cols-sm="3"
            label-align-sm="right"
          >
            <!-- <b-form-input id="nested-subtitle" ref="subtitle" name="subtitle"></b-form-input> -->
            <input
              type="text"
              class="form-control"
              name="subtitle"
              ref="subtitle"
              id=""
            />
          </b-form-group>

          <b-form-group
            label="Type post:"
            label-for="nested-post"
            label-cols-sm="3"
            label-align-sm="right"
          >
            <select ref="type_post" class="form-control" name="type_post">
              <option
                :value="category.id"
                v-for="category in categoryArticlePost"
                :key="category.id"
              >
                {{ category.category_post_name }}
              </option>
            </select>
          </b-form-group>
          <b-form-group
            label-for="nested-post"
            label-cols-sm="3"
            label-align-sm="right"
          >
            <input
              type="submit"
              class="btn btn-outline-primary"
              @click.prevent="addPost"
              value="Add"
            />
          </b-form-group>
        </form>
      </b-form-group>
    </b-card>
  </div>
</template>

<script>
// import { validationMixin } from "vuelidate";
// import { required, minLength } from "vuelidate/lib/validators";
export default {
  data() {
    return {
      image: String,
      categoryArticlePost: [],
    };
  },
  methods: {
    changeFile(e) {
      //Khi người dùng chọn ảnh thì hàm sẽ được thực thi
      this.image = e.target.files[0];
      var t = this.image.type.split("/").pop().toLowerCase();
      if (
        t != "jpeg" &&
        t != "jpg" &&
        t != "png" &&
        t != "bmp" &&
        t != "gif" &&
        t != "webp"
      ) {
        alert("Please select a valid image file");
        document.getElementById("img").value = "";
        return false;
      }
      return true;
    },
    async addPost() {
        if(this.$refs.title.value != "" && this.$refs.subtitle.value != ""){
                var formData = new FormData();
            formData.set("image", this.image);
            formData.set("title", this.$refs.title.value);
            formData.set("subtitle", this.$refs.subtitle.value);
            formData.set("type_post", this.$refs.type_post.value);
            axios
                .post("/api/add-section-article-post", formData)
                .then((resposnse) => {
                window.location.href = '/admin/innovation?noticeAdd="success"';
                });
        }
        else{
            alert('Vui lòng điền thông tin');
        }

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
</style>
