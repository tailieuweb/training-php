<template>
 <!-- Login ^-^ !-->
  <div class="vue-tempalte">
    <div class="container">
      <h1 class="title">Log In</h1>
      <div class="main-center">
        <p style="color: red" v-for="mess in mess_validation" :key="mess">{{ mess }}</p>
        <p style="color: red" id="mess_validation"></p>
        <!-- Form Login !-->
        <form>
          <div class="form-group">
            <label>Email address</label>
            <input
              v-model="email"
              type="text"
              class="form-control form-control-lg"
            />
          </div>

          <div class="form-group">
            <label>Password</label>
            <input
              v-model="password"
              type="password"
              class="form-control form-control-lg"
            />
          </div>

          <button
            type="submit"
            @click.prevent="login"
            class="btn btn-outline-info btn-lg btn-block btn_signin"
          >
            Sign In
          </button>

          <p class="forgot-password text-right mt-2 mb-4">
            <a
              class="btn btn-outline-info btn-block btn-lg a_signup"
              href="/register"
              >Sign up</a
            >
          </p>
        </form>
      </div>
      <div class="fix-space"></div>
    </div>
  </div>
</template>

<script>
    export default {
  data() {
    return {
      email: "",
      password: "",
      mess_validation: [],
    };
  },
  mounted() {
    let token = localStorage.getItem("user");
    //get token if null => back home page
    if (token != null) {
      window.location.href = "/home";
    }
    else{

    }
  },
  methods: {
    validateEmail(email) {
      const re =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    },
    login() {
      var c_mess_validation = document.querySelector("#mess_validation");
      this.mess_validation = [];
      c_mess_validation.innerHTML = "";
      //check empty input
      if (this.email == "" || this.password == "") {
        this.mess_validation.push("Vui lòng nhập thông tin đăng nhập!");
        return;
      }
      //validation email
      if (this.validateEmail(this.email) != true) {
        this.mess_validation.push("Vui lòng nhập khớp định dạng email!");
        return;
      }
      try {
        axios
          .post("/login", {
            email: this.email,
            password: this.password,
          })
          .then(function (response) {
             var data = localStorage.getItem("user"); //get key of localStorage
            if (response.data.length > 0) {
                var token_user = response.config.headers['X-XSRF-TOKEN'];
              if (!data) {
                //if empty data
                //create token and push to response
                response.data = response.data.map(item => item.id != 0 ? {...item,token : token_user} : item);
                let obj = {
                    'data' : {
                        time: new Date().getTime() + (1 * 3600 * 1000),
                        value: response.data,
                    }
                };
                localStorage.setItem("user",JSON.stringify(obj));
                window.location.href = "/home";
              }
            } else {
              c_mess_validation.innerHTML =
                "Thông tin tài khoản hoặc mật khẩu không đúng";
              return;
             }
          });
      } catch (error) {
        this.msg = error.response.data.msg;
      }
    },
  },
};
</script>
<style scoped>
html {
  height: 100%;
  background-repeat: no-repeat;
  background-color: #d3d3d3;
  font-family: "Oxygen", sans-serif;
}



h1.title {
  font-size: 50px;
  font-family: "Passion One", cursive;
  font-weight: 400;
  color: #fff;
  text-align: center;
  margin: 40px 0;
}

hr {
  width: 20%;
  height: 4px;
  color: #fff;
  background: #fff;
  border-radius: 6px;
  margin-bottom: 30px;
}

.form-group {
  margin-bottom: 10px;
}

.vue-tempalte{
    padding-top: 30px;
}

.main-center[data-v-6bdc8b8e] {
  max-width: 500px;
  border-radius: 15px;
  padding: 25px 40px;
  background: #fff;
}

label {
  margin-bottom: 10px;
  font-weight: 500;
}

label.lable-success {
  text-align: center;
  display: inherit;
  background: antiquewhite;
  padding: 15px 0;
  border-radius: 15px;
  color: brown;
  font-weight: 600;
  letter-spacing: 0.5px;
}

input.form-control {
  border: 1px solid #ced4da;
  border-radius: 7px !important;
  font-size: 15px;
}

input,
input::-webkit-input-placeholder {
  font-size: 15px;
  padding-top: 3px;
}

.form-control:focus {
  border-color: #2554ff;
  box-shadow: none;
}

.main-login {
  background-color: #fff;
  /* shadows and rounded borders */
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  /* -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3); */
  /* -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3); */
  /* box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3); */
  box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.2);
}

.main-center {
  margin-top: 30px;
  margin: 0 auto;
  max-width: 330px;
  padding: 40px 40px;
}

.login-button {
  margin-top: 5px;
}

.login-register {
  font-size: 11px;
  text-align: center;
}
ul {
  display: flex;
  justify-content: center;
}

li {
  border: 1px solid #2554ff;
  padding: 10px 15px;
  list-style: none;
  margin: 0 20px;
  text-align: center;
  width: 100%;
}
.btn_signin {
  background: linear-gradient(45deg, #00a8ff, #487eb0);
  color: white;
}
.a_signup {
  background: linear-gradient(-45deg, #7bed9f, #227093);
  color: white;
}
.fix-space{
    padding-bottom: 188px;
}
</style>
