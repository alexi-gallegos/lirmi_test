<template>
  <li class="list-group-item">
    <span
      @click="sendUserId(user.id)"
      v-if="useLocalApi == false"
      id="username"
      data-toggle="modal"
      data-target="#exampleModal"
    >{{ fullName }}</span>
    <span v-else>
      {{ fullName }}
    </span>
    <delete-button v-if="useLocalApi" :id-user="user.id"></delete-button>
  </li>
</template>

<script>
import { UserModalBus } from "../eventBus";
import DeleteButton from "./DeleteButton";
export default {
  name: "UsersList",
  components: {
    DeleteButton,
  },
  props: {
    user: {
      type: Object,
      required: true,
    },
    useLocalApi: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    sendUserId(id) {
      UserModalBus.$emit("showUserModal", id);
    },
  },
  computed: {
    fullName() {
      if (this.user.first_name && this.user.last_name) {
        return `${this.user.first_name} ${this.user.last_name}`;
      }
      return `${this.user.nombre} ${this.user.apellido}`;
    },
  },
};
</script>

<style scoped>
#username {
  cursor: pointer;
}
</style>