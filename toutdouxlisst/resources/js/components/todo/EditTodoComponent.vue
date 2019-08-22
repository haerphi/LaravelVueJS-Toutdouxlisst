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
        <div class="form-group">
          <button class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
    <br />

    <div class="card" style="width: 18rem;" v-for="task in tasks" :key="task.id">
      <div class="card-body task">
        <h2 class="card-title">{{ task.title }}</h2>
        <h6 class="card-subtitle mb-2 text-muted">Id: {{ task.id }}</h6>
        <button class="btn btn-primary" @click.prevent="editTask(task.id)">Edit</button>
        <button class="btn btn-danger" @click.prevent="deleteTask(task.id)">Delete</button>
      </div>
    </div>
  </div>
</template>

<script>
import { constants } from "crypto";
export default {
  data() {
    return {
      todo: {},
      tasks: []
    };
  },
  created() {
    let uri = `/api/todo/edit/${this.$route.params.id}`;
    this.axios.get(uri).then(response => {
      this.todo = response.data;
    });

    uri = `/api/tasks/${this.$route.params.id}`; //insert here the id user from the local storage;
    this.axios.get(uri).then(response => {
      this.tasks = response.data.data;
    });
  },
  methods: {
    updateTodo() {
      let uri = `/api/todo/update/${this.$route.params.id}`;
      this.axios.post(uri, this.todo).then(response => {
        this.$router.push({ name: "todoList" });
        console.log(response);
      });
    },
    deleteTask(id) {
      let uri = `/api/task/delete/${id}`;
      this.axios.delete(uri).then(response => {
        //suppresion du todo dans l'affiache ACTUEL (sans recharger)
        for (let i = 0; i < this.tasks.length; i++) {
          if (this.tasks[i].id == id) {
            this.tasks.splice(i, 1);
          }
        }
      });
    },
    editTask(id) {
      document.querySelectorAll(".task").forEach(task => {
        console.log(task);
      });
    }
  }
};
</script>
