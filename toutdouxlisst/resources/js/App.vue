<template>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Todo list app</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <router-link to="/" class="nav-link">Home</router-link>
          </li>
          <!-- Login & register !-->
          <li class="nav-item active">
            <router-link to="/login" class="nav-link">Login</router-link>
          </li>
          <li class="nav-item active">
            <router-link to="/register" class="nav-link">Register</router-link>
          </li>
          <li class="nav-item active" @click.prevent="logout()">
            <a href="javascript:void(0)" class="nav-link">Logout</a>
          </li>
          <!-- todo list !-->
          <li class="nav-item active">
            <router-link to="/todoList" class="nav-link">Todo list</router-link>
          </li>
        </ul>
      </div>
    </nav>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    logout() {
      console.log("logout");
      let uri = `/api/logout`;
      this.axios.get(uri).then(response => {
        console.log(response);
        localStorage.removeItem("iduser");
        localStorage.removeItem("token");
        this.$router.push({
          name: "login"
        });
      });
    }
  }
};
</script>