<template>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">HelloPost</a>
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
          <!-- todo list !-->
          <li class="nav-item active">
            <router-link to="/todoList" class="nav-link">Todo list</router-link>
          </li>
          <li class="nav-item dropdown">
            <router-link to="/todoCreate" class="nav-link">create a Todo</router-link>
          </li>
        </ul>
      </div>
    </nav>
    <router-view></router-view>
  </div>
</template>
<script>
export default {};
</script>