<template>
  <div class="card" id = "card-styled">
    <div class="card-header text-center font-weight-bold">
      <vue-header :title="this.title"/>


      <br />

      <ul id="example-1">
        <li id = "li-styled" v-for="(address,index) in addresses" :key="index">
          {{ address.address }} <alert-button :alert_text="address.address" :onClickButton="alertAddress" button_title="Alert Address"/>
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
            if (response.data)
              this.addresses = response.data;
            else
              console.log("Retrieved bad data.")

          })
          .catch(function (error) {
            console.log(error);
          });
        },
        alertAddress: function(address) {
          let base_message = "You chose this address: ";
          let full_message = base_message.concat(address);

          alert(full_message);
        }
      }
    }

</script>

<style scoped>
@import "styles/display-addresses-card.css"
</style>
