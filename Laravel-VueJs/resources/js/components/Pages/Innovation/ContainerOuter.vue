<template>
  <p class="d-none" ref="menuMainID">{{ getMenuID }}</p>
  <div class="container-outer">
    <div class="brandhub-thumb-tabs-btn-group-container">
      <div class="brandhub-thumb-tabs-btn-group">
        <MDBTabs  v-model="activeTabId1">
          <!-- <h2><MDBBadge color="primary">Click vào bên dưới để xem các chủ đề mới và phổ biến</MDBBadge></h2>  -->
          <!-- Tabs navs -->
          <span class="test">
            <MDBTabNav tabsClasses="mb-3 justify-content-center border-bottom-0">
              <ButtonTabsItem
                v-for="categoryItem in categoryArticlePostByID_Data"
                :key="categoryItem.id"
                :category_post_name="categoryItem.category_post_name"
                :category_article_post_id="categoryItem.id"
                :tabId="String(categoryItem.id)"
                :href="String(categoryItem.id)"
                @click="getID(categoryItem.id)"
              />
            </MDBTabNav>
          </span>
          <!-- Tabs navs -->
          <!-- Tabs content -->
          <!-- v-if này sẽ bắt sự kiện nếu có dữ liệu bài post !-->
          <MDBTabContent  v-if="sectionArticlePost_Data_ID.length > 0">
            <ContentTabs

              data-aos="fade-up"
              data-aos-offset="5"
              data-aos-delay="50"
              data-aos-duration="500"
              data-aos-easing="ease-in-out"
              data-aos-mirror="true"
              data-aos-once="false"
              v-model="getIDCategoryPost"
              :sectionArticlePost="Object(sectionArticlePost_Data_ID)"
              :tabId="String(getIDCategoryPost)"
            />
          </MDBTabContent>
           <!-- <MDBTabContent v-show="categoryArticleID.length > 0 && sectionArticlePost_Data_ID.length ==0">
            <ContentTabs
              :sectionArticlePost="categoryArticleID"
              :tabId="String(1)"
            />
          </MDBTabContent> -->
          <!-- !-->
          <!-- Tabs content -->
        </MDBTabs>
      </div>
    </div>
  </div>
</template>

<script>
import ButtonTabsItem from "./ContainerOuter/ButtonTabsItem.vue";
import ContentTabs from "./ContainerOuter/ContentTabs.vue";

import {
  MDBTabs,
  MDBTabNav,
  MDBTabContent,
  MDBTabItem,
  MDBTabPane,
  MDBInput,
  MDBBadge,
  // MDBBtn,
} from "mdb-vue-ui-kit";
import { ref } from "vue";
export default {
  name: "BreadCrumb",
  props: {
    getMenuID: Number,
  },
  components: {
    ButtonTabsItem,
    ContentTabs,
    MDBTabs,
    MDBTabNav,
    MDBTabContent,
    MDBTabItem,
    MDBTabPane,
    MDBInput,
    MDBBadge,
    //   MDBBtn
  },
  data() {
    return {
      activeTabId1: "",
      //   categoryArticlePost_Data: [],
      sectionArticlePost_Data_ID: [],
      categoryArticlePostByID_Data: [], //get all category_article_post data by menu main id
      getIDCategoryPost: 0,
      menuMainID: 0,
      testGetID: 0,
    };
  },
  async created() {
    // this.activeTabId1 = ref("1");
    // this.categoryArticlePost_Data = await this.getCategoryArticlePost_Data();
    this.sectionArticlePost_Data_ID = await this.getID();
    this.categoryArticlePostByID_Data =
      await this.getCategoryArticlePostByID_Data();

  },
  methods: {
    // async getCategoryArticlePost_Data() {
    //   const url = "/api/all-category-article-post-innovation/";
    //   const response = await fetch(url);
    //   const data = response.json();
    //   return data;
    // },
    async getCategoryArticlePostByID_Data() {
      //get all category_article_post data by menu main id
      this.menuMainID =
        this.$refs.menuMainID.innerHTML == 4
          ? this.$refs.menuMainID.innerHTML
          : null;
      const url =
        "/api/category-article-post-innovation-menu-main-id/" + this.menuMainID;
      const response = await fetch(url);
      const data = response.json();

      return data;
    },
    async getID(id) {
      this.getIDCategoryPost = id;
      const url = "/api/section-article-post-innovation/" + id;
      const response = await fetch(url);
      const data = response.json();
      this.sectionArticlePost_Data_ID = await data;
      return this.sectionArticlePost_Data_ID;
    },
  },
};
</script>

<style scoped>
.container-outer {
  margin: 0 auto;
  max-width: 1680px;
  width: 100%;
  background: #000;
}
.brandhub-thumb-tabs-btn-group-container {
  padding: 0;
  text-align: center;
}
.brandhub-thumb-tabs-btn-group {
  overflow: hidden;
  width: 100%;
}
.form-test {
  display: none;
}
</style>
