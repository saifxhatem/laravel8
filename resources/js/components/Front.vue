<template>
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      All users: <br />

      <ul id="example-1">
        <li v-for="user in users" :key="user.name">
          {{ user.name }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>

    export default {
      data: function() {
        return {
          users: []
        }
      },
      mounted() {
        this.loadUsers();
      },
      methods: {
        loadUsers: function () {
          //get Request
          //assign results
          //catch $errors
          axios.get('/list-users')
          .then((response) => {
            console.log(response.data);
            this.users = response.data;
          })
          .catch(function (error) {
            console.log(error);
          });
        }
      }
    }

</script>
