<template>
<!-- use header -->
  <Header />
  <div class="container">
    <h1 class="title">Update</h1>
    <main class="bg-dark">
      <form method="post">
        <input type="hidden" name="id" />
        <!-- v-model: hiển thị thông tin cần update -->
        <div class="form-group">
          <label for="name">Name</label>
          <input
            class="form-control"
            name="name"
            placeholder="name"
            v-model="user.name"
          />
        </div>
        <div class="form-group">
          <label for="username">User Name</label>
          <input
            class="form-control"
            name="username"
            placeholder="username"
            v-model="user.username"
          />
        </div>
        <div class="form-group">
          <label for="Email">Email</label>
          <input
            class="form-control"
            name="email"
            placeholder="email"
            v-model="user.email"
          />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            name="password"
            class="form-control"
            placeholder="Password"
            v-model="user.password"
          />
        </div>
        <div class="form-group-btn">
          <button
            type="submit"
            name="submit"
            value="submit"
            class="btn btn-outline-info"
            @click.prevent="updateUser"
          >
            Update
          </button>
        </div>
      </form>
    </main>
  </div>
   <!-- use footer -->
  <Footer />
</template>
<script>
import Header from "./Header";
import Footer from "./Footer";
export default {
  name: "Edit.vue",
  components: {
    Header,
    Footer,
  },
  data() {
    return {
      //Tạo object rỗng để lưu dữ liệu
      user: {
        name: "",
        email: "",
        username: "",
        password: "",
        password_confirmation: "",
        version: null,
      },
    };
  },
  //Xử lý khi không nhận đc id sẽ đưa về trang home
  mounted() {
    var current_url = window.location.href;
    var indexOf = current_url.lastIndexOf("/");
    var value_indexOf = atob(current_url.substr(indexOf + 1));
    value_indexOf = value_indexOf.substr(-20, 1);
    current_url = "/api/user-id/" + value_indexOf;

    axios.get(current_url).then((response) => {
      if (response.data.id) {
        this.user = response.data;
      } else {
       // window.location.href = "/home";
      }
    });
  },
  methods: {
    // Lấy dữ liệu sau khi người dùng đã sửa
    updateUser() {
      axios
        .post("/edit-user/" + this.user.id + "", {
          name: this.user.name,
          email: this.user.email,
          username: this.user.username,
          password: this.user.password,
          version: this.user.version,
        })
        .then((response) => {
             let newDa = JSON.parse(response.config.data);
              //data người dùng ms update
              console.log(newDa);
              //data mới
              console.log(response.data);
              //cập nhật
              const title = document.querySelector('.title');
              title.style.color = 'green';
              title.innerHTML = `Đang cập nhật...`;
              var time = setTimeout(function (){
                  title.innerHTML = `Đã cập nhật xong`;
              },1500);
        });
        //sau 3s cập nhật
        var timer = setTimeout(function() {
            window.location.href = "/home";
        }, 3000);
    },
  },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");
.title {
  margin: 30px 0;
  text-align: center;
  font-weight: 500;
  text-transform: uppercase;
  color: #2b5e90;
  font-family: "Poppins", sans-serif;
}

main[data-v-bc956840] {
  margin: 30px 10px;
  padding: 30px 50px;
  box-shadow: 3px 3px 10px rgb(0 0 0);
  border-radius: 5px;
}

label {
  color: #98a0a7;
  font-size: 18px;
}

.btn {
  padding: 10px 80px;
  background: #17a2b8;
  color: #fff;
  border: none;
  text-transform: uppercase;
  letter-spacing: 1px;
  outline: none;
  position: relative;
  overflow: hidden;
}

.form-group-btn {
  text-align: center;
}

.btn:focus {
  border: red;
}
</style>
