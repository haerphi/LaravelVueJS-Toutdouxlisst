// IndexComponent.vue

<template>
  <div>
    <h1>Register</h1>
    <form @submit.prevent="register">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control" v-model="user.title" />
            <label>Username:</label>
            <input type="text" class="form-control" v-model="user.title" />
            <label>Username:</label>
            <input type="text" class="form-control" v-model="user.title" />
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
  methods: {}
};
</script>
