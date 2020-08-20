<template>
  <div v-if="showAlert" :class="[baseClass, userCreated ? successClass : errorClass]" role="alert">
    <strong>{{ message }}</strong>
    <button type="button" class="close" @click="hideAlert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</template>

<script>
export default {
  name: "AlertModal",
  props: {
    userCreated: {
      type: Boolean,
      required: true,
    },
    showAlert: {
        type: Boolean,
        required: true
    },  
    message: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      baseClass: "alert alert-dismissible fade show my-3",
      successClass: "alert-success",
      errorClass: "alert-danger",
    }
  },
  methods: {
      hideAlert(){
          this.$parent.hideAlert();
      }
  }
};
</script>

<style>
</style>