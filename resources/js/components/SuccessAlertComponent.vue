<template>
    <div class="alert alert-success" role="alert">
        <center>
            Success!<br/> {{message}}
        </center>
    </div>
</template>


<script>
export default {

    props: {
        message: {
            type: String,
            default: ""
        }

    },
}
</script>

<style scoped>
@import "styles/button-styles.css"
</style>
