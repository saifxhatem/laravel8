<template>
    <button v-on:click="go_back" class="btn btn-primary"> Go Back </button>
</template>


<script>
export default {
    methods:
    {
        go_back(){
            this.$router.go(-1)
        }
    }
}
</script>