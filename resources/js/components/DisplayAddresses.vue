<template>
  <div class="card" id = "card-styled">
    <div class="card-header text-center font-weight-bold">
      <vue-header :title="this.title"/>


      <br />

      <ul id="example-1">
        <li id = "li-styled" v-for="(address,index) in addresses" :key="index">
          {{ address.address }} <alert-button :onClickButton="redirectToAddress" :data_object="address" button_title="Edit Address"/>
          <alert-button :onClickButton="fetchAddress" :data_object="address" button_title="Fetch Address"/>
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
          axios.get('/list-addresses')
          .then((response) => {
            //check existence of data before assigning
            if (response.data)
              this.addresses = response.data;
            else
              console.log("Retrieved bad data.")

          })
          .catch(function (error) {
            console.log(error);
          });
        },
        
        fetchAddress: function(address)
        {
          let address_id = address.id;
          this.$router.push({ name: 'displayAddressByID', params: { address_id } })
          .catch(function (error){
            console.log(error);
          })
        }
      }
    }

</script>

<style scoped>
@import "styles/display-addresses-card.css"
</style>
