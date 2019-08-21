<template>
  <div>
    <h1>Edit Todo</h1>
    <form @submit.prevent="updateTodo">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>todo Title:</label>
            <input type="text" class="form-control" v-model="todo.title" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>todo Body:</label>
            <textarea class="form-control" v-model="todo.body" rows="5"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>todo status:</label>
            <input type="text" class="form-control" v-model="todo.statut" />
          </div>
        </div>
      </div>
      <br />
      <div class="form-group">
        <button class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
</template>

<script>
import { constants } from "crypto";
export default {
  data() {
    return {
      todo: {}
    };
  },
  created() {
    let uri = `/api/todo/edit/${this.$route.params.id}`;
    this.axios.get(uri).then(response => {
      this.todo = response.data;
    });
  },
  methods: {
    updateTodo() {
      let uri = `/api/todo/update/${this.$route.params.id}`;
      this.axios.post(uri, this.todo).then(response => {
        this.$router.push({ name: "todoList" });
        console.log(response);
      });
    }
  }
};
</script>
