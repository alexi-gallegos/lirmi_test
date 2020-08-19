<template>
  <div class="col-md-4 mx-auto text-center">
    <ul class="list-group">
        <users-list 
            v-for="(user,index) in users"
            :key="index"
            :user="user"
        ></users-list>
    </ul>
    <modal-user  />
  </div>
</template>

<script>
import UsersList from './UsersList';
import ModalUser from './ModalUser';
export default {
  name: "Users",
  components:{
      UsersList,
      ModalUser
  },
  data() {
    return {
      users: [],
    };
  },
  methods: {
    getUsers(page = 1) {
      window.axios
        .get(`https://reqres.in/api/users?page=${page}`)
        .then((res) => this.users = res.data.data)
        .catch((err) => console.log(err));
    },
  },
  mounted() {
    this.getUsers();
  },
};
</script>

<style>
</style>