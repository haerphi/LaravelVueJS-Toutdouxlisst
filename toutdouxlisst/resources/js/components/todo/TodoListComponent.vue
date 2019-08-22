// IndexComponent.vue

<template>
  <div>
    <h1>Todo</h1>
    <div class="row">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <router-link :to="{ name: 'createTodo' }" class="btn btn-primary">Create</router-link>
      </div>
    </div>
    <br />
    <div class="card" style="width: 18rem;" v-for="todo in todos" :key="todo.id">
      <div class="card-body">
        <h2 class="card-title">{{ todo.title }}</h2>
        <h6 class="card-subtitle mb-2 text-muted">Id: {{ todo.id }}</h6>
        <router-link :to="{name: 'edittodo', params: { id: todo.id }}" class="btn btn-primary">Edit</router-link>
        <button class="btn btn-danger" @click.prevent="deleteTodo(todo.id)">Delete</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      todos: []
    };
  },
  created() {
    let uri = "/api/todos/0"; //insert here the id user from the local storage;
    this.axios.get(uri).then(response => {
      this.todos = response.data.data;
    });
  },
  methods: {
    deleteTodo(id) {
      let uri = `/api/todo/delete/${id}`;
      this.axios.delete(uri).then(response => {
        //suppresion du todo dans l'affiache ACTUEL (sans recharger)
        for (let i = 0; i < this.todos.length; i++) {
          if (this.todos[i].id == id) {
            this.todos.splice(i, 1);
          }
        }
      });
    }
  }
};
</script>
