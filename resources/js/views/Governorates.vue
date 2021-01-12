<template>
    <div>
        <display-governorates-paginated/>
        <center><button v-on:click="add_new_governorate" class="btn btn-primary">Add New Governorate</button></center>
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
        add_new_governorate() {
            this.$router.push({ name: 'add-gov', params: { user_id: this.$route.params.user_id } })
        }
    }
}
</script>