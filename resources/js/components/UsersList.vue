<template>
  <li 
    class="list-group-item" 
    @click="sendUserId(user.id)"
    data-toggle="modal" 
    data-target="#exampleModal"
    >{{ fullName }}</li>
</template>

<script>
import { UserModalBus } from '../eventBus';
export default {
  name: "UsersList",
  props: {
    user: {
      type: Object,
      required: true,
    },
  },
  methods: {
      sendUserId(id){
          UserModalBus.$emit('showUserModal', id);
      }
  },
  computed: {
    fullName() {
      return `${this.user.first_name} ${this.user.last_name}`;
    },
  },
};
</script>

<style scoped>
.list-group-item {
  cursor: pointer;
}
</style>