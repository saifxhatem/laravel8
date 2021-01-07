<template>

  <button id = "custom-button" v-on:click="exec">{{button_title}}</button>

</template>


<script>

export default {

  props: {
    onClickButton: {
      type: Function,
      default: null
    },
    button_title: {
      type: String,
      default: "My Button"
    },
    data_object: {
      type: Object,
      default: null
    }

  },

  methods: {
    exec: function (event) {
      if (this.onClickButton)
      {
        if (this.data_object)
        this.onClickButton(this.data_object);
      }
    }
  }
}

</script>

<style scoped>
@import "styles/button-styles.css"
</style>
