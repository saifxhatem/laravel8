<template>
  <div class="card" id = "card-styled">
    <div class="card-header text-center font-weight-bold">
      <vue-header :title="this.title"/>


      <br />

      <ul id="example-1">
        <p id = "li-styled">
          
          Address ID: {{ this.addresses.id }}<br>
          Area ID: {{ this.addresses.area_id }}<br>
          Address: {{ this.addresses.address }}<br>


        </p>
      </ul>
    </div>
  </div>
</template>

<script>

    export default {
      props: {
        address_id: {
          type: Number,
          default: 1
        }
      },

      data: function() {
        return {
          addresses: [],
          title: "Address Info:"
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
          axios.get('/fetch-address-by-id/' + this.address_id)
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
      }
    }

</script>

<style scoped>
@import "styles/display-addresses-card.css"
</style>
