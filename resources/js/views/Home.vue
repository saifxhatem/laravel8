<template>
    <div>
        <center><h1>User ID: {{$route.params.user_id}}</h1></center>
        <center><button v-on:click="go_to_addresses" class="btn btn-primary"> View Addresses</button>
        <button v-on:click="go_to_governorates" class="btn btn-primary"> View Governorates</button>
        <br><br>
        <back-button/>
        </center>
    </div>
</template>


<script>
export default {

    methods:
    {
        go_to_addresses()
        {
            this.$router.push({ name: 'addresses', params: { user_id : this.$route.params.user_id } }) 
        },
        go_to_governorates()
        {
            this.$router.push({ name: 'governorates', params: { user_id : this.$route.params.user_id } }) 

        }
    }
    
}
</script>