<template>
  <div class="alert alert-success" role="alert">
    <h1 v-if="show_alert"> {{ message }} </h1>
  </div>
</template>

<script>


export default
{

  data: function ()
  {
    return {
      message: "Everything's a-ok"
    }
  },


  props : {
    message: String;
    show_alert: Boolean;

  }
}
</script>
