<template>


  <head>
      <title>{{ pageTitle }}</title>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
</template>


<script>

export default {
  data: function() {
    return {
        pageTitle
    }
  },
  mounted() {
    console.log("Header component loaded");
  },
  props: ['pageTitle']
}

</script>
