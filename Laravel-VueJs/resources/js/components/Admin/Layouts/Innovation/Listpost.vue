<template>
  <MDBTable class="responsive">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Subtitle</th>
        <th scope="col">Type Post</th>
        <th scope="col">Created</th>
        <th scope="col" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="item in data" :key="item.id">

        <th scope="row">{{item.id}}</th>
        <td><img :src="'/' + item.image_article" alt=""></td>
        <td style="max-width:200px">{{ item.title_article }}</td>
        <td style="max-width:200px">{{ item.subtitle_article }}</td>
        <td style="max-width:200px">{{item.category_post_name}}</td>
        <td>{{ item.created_at }}</td>
        <td>
          <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#addpost"
            @click="getIDNewPost(item.id)"
          >
            Edit
          </button>
        </td>
        <td>Deleted</td>
      </tr>
    </tbody>
  </MDBTable>
  <ModalAdd
    :sectionArticlePost="dataSectionArticleByID"
  />
</template>

<script>
import { MDBTable } from "mdb-vue-ui-kit";
import ModalAdd from "./ModalAdd.vue";
export default {
  components: {
    MDBTable,
    ModalAdd,
  },
  data() {
    return {
      data: [],
      dataSectionArticleByID : [],
      checkClickEditButton : false
    };
  },
  methods: {
    async getAllSectionArticleNewPost() {
      const url = "/api/all-section-articles-post-new-innovation/";
      const response = await fetch(url);
      const data = response.json();
      console.log(data);
      return data;
    },
    async getIDNewPost(id){
        const url = '/api/section-article-post-innovation-id/' + id;
        const response = await fetch(url);
        const data = await response.json();
        this.dataSectionArticleByID = data;
        this.checkClickEditButton = true
    }
  },
  async created() {
    this.data = await this.getAllSectionArticleNewPost();
  },
};
</script>

<style scoped>
img{
    max-width: 100%;
    width: 200px;
    height: 240px;
}
</style>
