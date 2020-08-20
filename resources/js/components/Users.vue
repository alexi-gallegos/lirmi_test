<template>
  <div class="col-md-4 mx-auto text-center mt-5">
    <users-not-found-message 
      v-if="users.length == 0 && fetchingUsers == false"
    ></users-not-found-message>
    <p v-if="serverError">Lo sentimos, intente más tarde</p>
    <search-box-user v-if="useLocalApi == false"></search-box-user>
    <ul v-if="users.length > 0" class="list-group">
      <users-list
        v-for="(user,index) in users"
        :key="index"
        :user="user"
        :use-local-api="useLocalApi"
      ></users-list>
    </ul>
    <a v-if="useLocalApi == false" :href="url">Ir a usuarios local</a>
    <paginate
      v-if="users.length > 0 && pageCount > 1"
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
import { reloadList } from "../eventBus";
import Swal from "sweetalert2";
import UsersNotFoundMessage from "./UsersNotFoundMessage";
export default {
  name: "Users",
  components: {
    UsersList,
    ModalUser,
    SearchBoxUser,
    UsersNotFoundMessage,
  },
  props: {
    useLocalApi: {
      type: Boolean,
      default: true,
    },
    url: {
      type: String,
    },
  },
  data() {
    return {
      users: [],
      pageCount: 0,
      deletedUser: false,
      fetchingUsers: true,
      serverError: false
    };
  },
  methods: {
    getUsers(page = 1) {
      let axiosApi = this.useLocalApi ? window.localApi : window.externalApi;
      this.fetchingUsers = true;
      this.serverError = false;
      axiosApi
        .get(`/users?page=${page}`)
        .then((res) => {
          this.users = res.data.data;
          if (res.data.total_pages) {
            this.pageCount = res.data.total_pages;
          } else {
            this.pageCount = res.data.last_page;
          }
        })
        .catch((err) => this.serverError = true)
        .finally(() => this.fetchingUsers = false);
    },
    paginationHandler(pageNum) {
      this.getUsers(pageNum);
    },
  },
  mounted() {
    reloadList.$on("reloadTable", () => {
      Swal.fire({
        title: "Eliminado.",
        text: "Usuario eliminado correctamente.",
        icon: "success",
      });
      this.getUsers();
    });
    this.getUsers();
  },
};
</script>

<style>
</style>