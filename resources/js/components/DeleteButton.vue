<template>
  <button class="btn btn-sm btn-danger float-right" @click="deleteUser">Eliminar</button>
</template>

<script>
import { reloadList } from "../eventBus";
export default {
  name: "DeleteButton",
  props: {
    idUser: {
      type: Number,
      required: true,
    },
  },
  methods: {
    deleteUser() {
      window.localApi
        .delete("/user", {
          data: {
            id_user: this.idUser,
          },
        })
        .then((res) => reloadList.$emit("reloadTable"))
        .catch((err) => {
          Swal.fire({
            title: "Error!",
            text: "Error al intentar eliminar usuario",
            icon: "error",
          });
        });
    },
  },
};
</script>

<style>
</style>