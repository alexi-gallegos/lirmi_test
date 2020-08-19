<template>
<div>
    <div class="row">
        <div class="col-md-4">
        <img 
            :src="user.avatar"
            class="rounded-circle"
        >
        </div>
        <div class="col-md-4 text-left">
            <p>{{ user.first_name }}</p>
            <p>{{ user.last_name }}</p>
            <p>{{ user.email }}</p>
        </div>
    </div>
    <button 
        class="btn btn-primary"
    >Registrar</button>
</div>
</template>

<script>
export default {
    name: 'ModalUserCard',
    props: {
        user: {
            type: Object,
            required: true
        }
    }
};
</script>

<style>
</style>