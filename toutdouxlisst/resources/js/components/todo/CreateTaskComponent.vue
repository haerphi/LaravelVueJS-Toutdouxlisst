<template>
  <div class="container">
    <form @submit.prevent="create">
      <h1>Task:</h1>
      <br />
      <label>Titre:</label>
      <br />
      <input type="text" alt="title" v-model="task.title" />
      <br />
      <label>Statut:</label>
      <input type="text" alt="status" v-model="task.status" />
      <input type="submit" alt="envoyer" />
    </form>
  </div>
</template>
<script>
import { log } from "util";
export default {
  data() {
    return {
      task: { idTodo: this.$route.params.id } //this.$route.params.id
    };
  },
  methods: {
    create() {
      let uri = "../api/task/store";
      console.log(this.task);
      this.axios
        .post(uri, this.task)
        .then(response => {
          //sucess
          this.$router.push({
            name: "edittodo",
            params: { id: this.$route.params.id }
          });
        })
        .catch(error => {
          console.log("POURQUééééé?!");
        });
    }
  }
};
</script>