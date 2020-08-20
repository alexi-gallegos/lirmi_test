<template>
  <form @submit.prevent="searchUser" class="form-inline justify-content-center">
    <label class="sr-only" for="userId">ID Usuario</label>
    <input
      type="text"
      v-model="userID"
      class="form-control mb-2 mr-sm-2"
      id="userId"
      placeholder="ID Usuario, Eg: 2"
    />
    <button id="btnModal" type="submit" class="btn btn-primary mb-2">Buscar</button>
    <div class="invalid-feedback mb-1">Ingresa un número válido entre 1 y 24.</div>
  </form>
</template>

<script>
import { UserModalBus } from "../eventBus";
export default {
  name: "SearchBoxUser",
  data() {
    return {
      userID: "",
      invalidIdNumber: false,
    };
  },
  methods: {
    searchUser() {
      if (isNaN(this.userID) || this.userID < 1 || this.userID > 24) {
        window.jQuery("#userId").addClass("is-invalid");
        return;
      }
      window.jQuery("#userId").removeClass("is-invalid");
      window.jQuery("#exampleModal").modal("show");
      UserModalBus.$emit("showUserModal", this.userID);
    },
  },
};
</script>

<style>
</style>