<template>
  <div>
    <b-alert
      v-model="showTop"
      class="position-fixed fixed-top m-0 rounded-0"
      style="z-index: 2000"
      variant="success"
      dismissible
    >
      Đã sửa
    </b-alert>
     <b-alert
      v-model="showTop"
      class="position-fixed fixed-top m-0 rounded-0"
      style="z-index: 2000"
      variant="success"
      dismissible
    >
      Đã thêm
    </b-alert>
  </div>
  <MDBTabs v-model="activeTabId1">
    <!-- Tabs navs -->
    <MDBTabNav tabsClasses="mb-3">
      <MDBTabItem tabId="ex1-1" href="ex1-1"
        >Danh sách các chủ đề mới</MDBTabItem
      >
      <MDBTabItem tabId="ex1-2" href="ex1-2"
        >Danh sách các chủ đề phổ biến</MDBTabItem
      >
       <MDBTabItem tabId="ex1-3" href="ex1-3"
        >Thêm chủ đề mới</MDBTabItem
      >
    </MDBTabNav>
    <!-- Tabs navs -->
    <!-- Tabs content -->
    <MDBTabContent>
      <MDBTabPane tabId="ex1-1">
        <Listpost />
      </MDBTabPane>
      <MDBTabPane tabId="ex1-2">Content #2</MDBTabPane>
      <MDBTabPane tabId="ex1-3">
          <AddPost />
      </MDBTabPane>
    </MDBTabContent>
    <!-- Tabs content -->
  </MDBTabs>
</template>

<script>
import AddPost from "SrcComponent/components/Admin/Layouts/Innovation/AddPost.vue";
import Listpost from "SrcComponent/components/Admin/Layouts/Innovation/Listpost.vue";
import {
  MDBTabs,
  MDBTabNav,
  MDBTabContent,
  MDBTabItem,
  MDBTabPane,
} from "mdb-vue-ui-kit";
import { ref } from "vue";
export default {
  name: "Innovation_admin",
  data() {
    return {
      activeTabId1: 0,
      notice: "",
      showBottom: false,
      showTop: false,
    };
  },
  created() {
      this.activeTabId1 = ref("ex1-1");
    var href = new URL(window.location.href);
    this.notice = href.searchParams.get("notice");
    this.noticeAdd = href.searchParams.get("noticeAdd");
    if (this.notice != null) {
      this.showTop = true;
      setTimeout(() => {
        this.showTop = false;
        window.location.href = "/admin/innovation";
      }, 1500);
    } else if (this.noticeAdd != null) {
      this.showTop = true;
      setTimeout(() => {
        this.showTop = false;
        window.location.href = "/admin/innovation";
      }, 1500);
    }
  },
   mounted() {
    //Check expire token of user
    var user = JSON.parse(localStorage.getItem("user"));
    if (user == null) {
      this.load = false;
      window.location.href = "/login";
    }
    if (Date.now() > user.data.time) {
      //check time now and expire time of localStorage
      localStorage.removeItem("user");
      alert("Phiên đăng nhập đã hết hạn, vui lòng đăng nhập lại.");
      window.location.href = "/login";
    }
  },
  components: {
    AddPost,
    Listpost,
    MDBTabs,
    MDBTabNav,
    MDBTabContent,
    MDBTabItem,
    MDBTabPane,
  },
};
</script>

<style scoped>
</style>
