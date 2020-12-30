<template>
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      <vue-header :title="this.title"/>


      <br />

      <ul id="example-1">
        <li v-for="(address,index) in addresses" :key="index">
          {{ address.address }} <alert-button :address="address.address"/>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>

    export default {
      data: function() {
        return {
          addresses: [],
          title: "All Addresses"
        }
      },
      mounted() {
        this.loadAddresses();
      },
      methods: {
        loadAddresses: function () {
          //get Request
          //assign results
          //catch $errors
          axios.get('/list-all-addresses')
          .then((response) => {
            //check existence of data before you assign
            this.addresses = response.data;

          })
          .catch(function (error) {
            console.log(error);
          });
        }
      }
    }

</script>

<style scoped>
@import "styles/display-addresses-card.css"
</style>
