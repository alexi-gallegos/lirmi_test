<template>
  <div class="col-md-4 mx-auto text-center mt-5">
    <search-box-user></search-box-user>
    <ul class="list-group">
      <users-list v-for="(user,index) in users" :key="index" :user="user"></users-list>
    </ul>
    <paginate
    v-if="users.length > 0"
      :page-count="pageCount"
      :click-handler="paginationHandler"
      :prev-text="'Prev'"
      :next-text="'Next'"
      :page-class="'page-item'"
      :page-link-class="'page-link'"
      :prev-link-class="'page-link'"
      :next-link-class="'page-link'"
      :container-class="'pagination justify-content-center mt-3'"
    ></paginate>
    <modal-user />
  </div>
</template>

<script>
import UsersList from "./UsersList";
import ModalUser from "./ModalUser";
import SearchBoxUser from "./SearchBoxUser";
export default {
  name: "Users",
  components: {
    UsersList,
    ModalUser,
    SearchBoxUser,
  },
  data() {
    return {
      users: [],
      pageCount: 0
    };
  },
  methods: {
    getUsers(page = 1) {
      window.axios
        .get(`https://reqres.in/api/users?page=${page}`)
        .then((res) => {
            console.log(res);
            this.users = res.data.data;
            this.pageCount = res.data.total_pages;
        })
        .catch((err) => console.log(err));
    },
    paginationHandler(pageNum){
        this.getUsers(pageNum);
    }
  },
  mounted() {
    this.getUsers();
  },
};
</script>

<style>
</style>