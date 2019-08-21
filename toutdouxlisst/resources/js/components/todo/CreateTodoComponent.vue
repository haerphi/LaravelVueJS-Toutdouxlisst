<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Create a todo</div>

          <form @submit.prevent="create">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Title:</label>
                  <input type="text" class="form-control" v-model="todo.title" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Description:</label>
                  <textarea class="form-control" v-model="todo.body" rows="5"></textarea>
                </div>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>statut:</label>
                  <input type="text" class="form-control" v-model="todo.statut" />
                </div>
              </div>
            </div>
            <br />
            <div class="form-group">
              <button class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { log } from "util";
export default {
  data() {
    return {
      todo: { idUser: 0 } //Inset here the user id from the local storage
    };
  },
  methods: {
    create() {
      let uri = "api/todo/store";
      this.axios
        .post(uri, this.todo)
        .then(response => {
          //sucess
          this.$router.push({ name: "todoList" });
        })
        .catch(error => {
          console.log("Fuck it");
        });
    }
  }
};
</script>
