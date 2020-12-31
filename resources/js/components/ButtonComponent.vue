<template>

  <button id = "custom-button" v-on:click="alert">{{button_title}}</button>

</template>


<script>

export default {

  props: {
    alert_text: {
      type: String,
      default: "Alert Text!"
    },
    onClickButton: {
      type: Function,
      default: null
    },
    button_title: {
      type: String,
      default: "My Button"
    }
  },

  methods: {
    alert: function (event) {
      if (this.onClickButton)
        this.onClickButton(this.alert_text);

    }
  }
}

</script>

<style scoped>
@import "styles/button-styles.css"
</style>
