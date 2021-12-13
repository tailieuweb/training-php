<template>
  <header>
    <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
      <img
        style="width: 70px; height: 70px"
        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9iRz0GPSTPBc9ZeGpO-BLWwcAmUy2Xv1XyQ&usqp=CAU"
      />
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a href="/admin/innovation" class="btn btn-outline-success"
            >Admin Sub group</a
          >
        </li>
        <li class="nav-item">
          <a href="/admin/innovation" class="btn btn-outline-success"
            >Admin Innovation</a
          >
        </li>
        <li class="nav-item">
          <a href="/admin-header" class="btn btn-outline-success"
            >Admin Header</a
          >
        </li>

        <li class="nav-item">
          <a class="btn btn-outline-success" href="admin/footer">
            Admin Footer</a
          >
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-success" href="admin/slides">
            Admin Slides</a
          >
        </li>
        <li class="nav-item">
          <button type="button" class="btn btn-outline-success">
            <a @click.prevent="logout">Logout</a>
          </button>
        </li>
      </ul>
    </nav>
  </header>
</template>
<script>
export default {
  name: "Header.vue",
  methods: {
    //đăng xuất - xóa token và quay về login
    logout() {
      localStorage.removeItem("user");
      var user = localStorage.getItem("user");
      if (user == null) {
        window.location.href = "/login";
      }
    },
    category() {
      window.location.href = "/admin/category";
    },
  },
};
</script>
<style scoped>
li {
  display: flex;
}
h1 {
  color: transparent;
  font-size: 50px;
  background-image: linear-gradient(
    to right bottom,
    black,
    red,
    pink,
    orange,
    #00aefd,
    green
  );
  background-clip: text;
  -webkit-background-clip: text;
  display: inline-block;
  font-weight: bold;
}
a.btn {
  text-decoration: none;
  margin: 0 10px;
}
</style>
