// IndexComponent.vue

<template>
  <div>
    <h1>Login</h1>
    <form @submit.prevent="login">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control" v-model="user.email" />
            <label>password:</label>
            <input type="text" class="form-control" v-model="user.password" />
          </div>
        </div>
      </div>
      <br />
      <div class="form-group">
        <button class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>
</template>
<script>
import { log } from "util";
export default {
  data() {
    return {
      user: {}
    };
  },
  methods: {
    login() {
      let uri = "/api/auth/login"; //insert here the id user from the local storage;
      this.axios.post(uri, this.user).then(response => {
        console.log(response.data[0]);
      });
    }
  }
};
</script>
