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
    let id = "-1";
    if (localStorage.getItem("iduser") != null) {
      console.log(localStorage.getItem("iduser"));
      id = localStorage.getItem("iduser");
    }
    return {
      todo: { idUser: id } //Inset here the user id from the local storage
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
