<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Información de usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img 
                v-if="loading"
                width="100px" 
                src="https://miro.medium.com/max/882/1*9EBHIOzhE1XfMYoKz1JcsQ.gif" 
            />
            <modal-user-card 
            v-if="loading == false && userFound == true" 
            :user="user"
            ></modal-user-card>
            <p
                v-if="loading == false && userFound == false"
            >Usuario no encontrado.</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { UserModalBus } from "../eventBus";
import ModalUserCard from './ModalUserCard';
export default {
  name: "ModalUser",
  components: {
      ModalUserCard
  },
  data() {
    return {
      user: {},
      loading: true,
      userFound: false,
    };
  },
  methods: {
    getUser(userId) {
        this.loading = true;
      window.axios
        .get(`https://reqres.in/api/users?id=${userId}`)
        .then((res) => {
          this.user = res.data.data;
          this.userFound = true;
        })
        .catch((err) => {
            if(err.response.status == 404){
                this.userFound = false;
            }
        })
        .finally(() => this.loading = false);
    },
  },
  created() {
    UserModalBus.$on("showUserModal", (userId) => {
      this.getUser(userId);
    });
  },
};
</script>

<style>
</style>