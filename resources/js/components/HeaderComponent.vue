<template>
    <div class="header">
        <label> {{title}} </label>
    </div>
</template>


<script>
export default {
    props: {
        title: {
            type: String,
            default: "My Title"
        }
    },

}
</script>

<style scoped>
@import "styles/header-styles.css"
</style>
