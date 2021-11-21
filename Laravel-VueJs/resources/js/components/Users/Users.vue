<template>
    <!-- Component users xử lý hiển thị danh sách users !-->
    <!--component users!-->
  <tr class="show-info" v-for="user in users.data" :key="user.id">
    <td>
      <p>{{ user.id }}</p>
    </td>
    <td>
      <p>{{ user.name }}</p>
    </td>
    <td>
      <p>{{ user.username }}</p>
    </td>
    <td>
      <p>{{ user.email }}</p>
    </td>
    <td class="action">
      <a href="/edit" class="edit" @click.prevent="edit(user.id)">
        <i class="fas fa-user-edit"></i>
      </a>
      <a href="/delete" class="delete" @click.prevent="deleteUser(user.id, user.email)"> <!-- bắt sự kiện -->
        <i class="fas fa-trash-alt"></i>
      </a>
    </td>
  </tr>
  <!-- pagination !-->
  <v-pagination
    v-model="currentPage"
    :pages="lastPage"
    :range-size="1"
    active-color="#DCEDFF"
    @update:modelValue="updateHandler"
  />
</template>

<script>
import VPagination from "@hennge/vue3-pagination";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";
export default {
  name: "Users.vue",
  data() {
    return {

    };
  },
  components: {
    VPagination,
  },
  methods: {
    async updateHandler() {
      const url = "/api/all-user?page=" + this.currentPage;
      const response = await fetch(url);
      const data = await response.json();
      this.users.data = data.data;
    },
    edit(id) {
      window.location.href = "edit/" + btoa(id + "123");
    },

    //xử lí front-end và không cho xóa user đăng nhập
    deleteUser(id,email) {
      let data = JSON.parse(localStorage.getItem("user"));
      let newData = data.data.value[0].email;

      if(newData == email){
        alert("Bạn không thể xóa tài khoản này!!")
      }
      else{
        axios.post("/delete/" + id + "", {}).then((response) => {
        console.log(response.data);
      });
      const index = this.users.data.indexOf(id);
      this.users.data.splice(index, 1);
      alert("Xóa thành công!!");
      }
        window.location.href = "/home";
    },
  },
  props: {
    //props of users
    users: Object,
    stt: Number,
    currentPage: Number,
    pageSize: Number,
    total: Number,
    lastPage: Number,
  },
};
</script>

<style scoped>

.show-info p {
  overflow: auto;
  margin-bottom: 0;
  padding-bottom: 10px;
  /* cursor: pointer; */
}

.show-info p::-webkit-scrollbar {
  width: 10px;
  height: 8px;
  cursor: pointer;
}

.show-info p::-webkit-scrollbar-track {
  background: #2f373d;
  border-radius: 10px;
}

.show-info p::-webkit-scrollbar-thumb {
  background: #444b50;
  box-shadow: 0 0 7px #333;
  padding: 5px 0;
  border-radius: 10px;
}

.show-info p::-webkit-scrollbar-thumb:hover {
  background: #374a5c;
}
.action {
  position: relative;
}
.action a.edit {
  position: absolute;
  top: 3px;
  padding: 15px;
  left: 20px;
  color: cyan;
}
.action a.delete {
  position: absolute;
  top: 3px;
  padding: 15px 18px;
  right: 60px;
  color: rgb(255, 21, 21);
}
.action a:hover {
  background: #505050;
  border-radius: 10px;
}

.action a.delete:hover::before {
  position: absolute;
  top: -5px;
  font-size: 10px;
  left: 55px;
  font-weight: 500;
  color: #c2c2c2;
  letter-spacing: 1px;
  padding: 10px;
  border-radius: 5px;
  box-shadow: 3px 3px 7px rgba(0, 0, 0, 0.3);
  content: "Delete";
  pointer-events: none;
}
.action a.edit:hover::before {
  position: absolute;
  letter-spacing: 1px;
  top: -5px;
  font-size: 10px;
  left: 55px;
  font-weight: 500;
  color: #c2c2c2;
  padding: 10px 15px;
  border-radius: 5px;
  box-shadow: 3px 3px 7px rgba(0, 0, 0, 0.3);
  content: "Edit";
  pointer-events: none;
}

.action a i {
  font-size: 17px;
}
.Pagination[data-v-2a30deb0] {
  flex-wrap: inherit;
  padding: 8px 15px;
  background: #fff;
  margin: 10px 0;
  border-radius: 6px;
  box-shadow: 0 0 10px #fff;
  justify-content: space-between;
  transform: translateX(27em);
}
svg[data-v-2a30deb0] {
  fill: brown;
}
</style>
