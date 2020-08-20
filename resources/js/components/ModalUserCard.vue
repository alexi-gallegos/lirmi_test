<template>
  <div>
    <div class="row">
      <div class="col-md-4">
        <img :src="user.avatar" class="rounded-circle" />
      </div>
      <div class="col-md-4 text-left">
        <p>{{ user.first_name }}</p>
        <p>{{ user.last_name }}</p>
        <p>{{ user.email }}</p>
      </div>
    </div>
    <alert-modal
        :user-created="userCreated.ok"
        :show-alert="showAlert"
        :message="userCreated.message"
    ></alert-modal>
    <button class="btn btn-primary" @click="createUser">Registrar</button>
  </div>
</template>

<script>
import AlertModal from './AlertModal';
export default {
  name: "ModalUserCard",
  components: {
      AlertModal
  },
  data() {
    return {
      userCreated: {
        ok: false,
        message: "",
      },
      showAlert: false
    };
  },
  props: {
    user: {
      type: Object,
      required: true,
    },
  },
  methods: {
    createUser() {
        this.showAlert = false;
      window.axios
        .post("/user", this.user)
        .then((res) => {
          this.userCreated.ok = true;
          this.userCreated.message = res.data.message;
        })
        .catch((err) => {
          this.userCreated.ok = false;
          if (err.response.status == 409) {
            this.userCreated.message = err.response.data.message;
          } else {
            this.userCreated.message = "Lo sentimos, intente más tarde.";
          }
        }).finally(() => this.showAlert = true);
    },
    hideAlert(){
        this.showAlert = false;
    }
  },
};
</script>

<style>
</style>