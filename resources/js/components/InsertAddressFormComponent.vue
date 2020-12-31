<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Insert Address:</div>

          <div class="card-body">
            <form @submit.prevent= "postData" method= "post">
              <div class="form-group">
                <label for="user-id-label">User ID</label>
                <input
                  type="text"
                  class="form-control"
                  id="user-id"
                  aria-describedby="User's ID"
                  placeholder="Enter ID"
                  v-model = "formData.user_id"
                />
              </div>
              <div class="form-group">
                <label for="new-address-label">Address</label>
                <input
                  type="text"
                  class="form-control"
                  id="address"
                  placeholder="Address"
                  v-model = "formData.address"
                />
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>


export default {

    name: "InsertAddressForm",

    data()
    {
      return {
        formData: {
          user_id: null,
          address: null
        }
      }
    },
    
    mounted() {
        console.log('Component mounted.')
    },

    methods:
    {
      postData(e)
      {
          console.log(this.formData);
          axios.post("store-data", this.formData)
          .then((result) => {
            console.log(result)
          })

      }
    }
}
</script>
