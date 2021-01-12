<template>
    <div>
        <display-addresses-paginated/>
        <center><button v-on:click="add_new_address" class="btn btn-primary">Add New Address</button></center>
        <br>
        <br>
        <center>
            <back-button/>
        </center>
    </div>
</template>


<script>
export default {

    methods: {
        add_new_address() {
            this.$router.push({ name: 'add-address', params: { user_id: this.$route.params.user_id } })
        }
    }
}
</script>