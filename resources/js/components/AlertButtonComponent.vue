<template>

  <button v-on:click="alert">Click Me!</button>

</template>


<script>

export default {

  props: {
    address: {
      type: String,
      default: "My Address"
    }
  },
  methods: {
    alert: function (event) {
      alert('You chose address: ' + this.address)
    }
  }
}

</script>

<style scoped>
@import "styles/button-styles.css"
</style>
