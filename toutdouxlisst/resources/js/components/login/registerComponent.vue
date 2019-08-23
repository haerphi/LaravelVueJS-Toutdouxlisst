// IndexComponent.vue

<template>
  <div>
    <h1>Register</h1>
    <form @submit.prevent="register">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control" v-model="user.name" />
            <label>Email:</label>
            <input type="text" class="form-control" v-model="user.email" />
            <label>Password:</label>
            <input type="text" class="form-control" v-model="user.password" />
            <label>Password confirme:</label>
            <input type="text" class="form-control" v-model="user.password_confirmation" />
          </div>
        </div>
      </div>
      <br />
      <div class="form-group">
        <button class="btn btn-primary">register</button>
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
    register() {
      let uri = "/api/auth/register"; //insert here the id user from the local storage;
      this.axios.post(uri, this.user).then(response => {
        console.log(response);
      });
    }
  }
};
</script>
