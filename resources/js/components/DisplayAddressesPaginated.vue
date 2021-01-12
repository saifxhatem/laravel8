<template>
    <div>
        <error-alert v-if="show" message="Error" :error="err_msg"> </error-alert>
        <div class="card" id="card-styled">
            <div class="card-header text-center font-weight-bold">
                <vue-header :title="this.title" />
                <br />
                <ul id="example-1">
                    <li id="li-styled" v-for="(address,index) in addresses" :key="index">
                        {{ address.address }}
                    </li>
                </ul>
                <center>
                    <button v-on:click="backwards" class="btn btn-primary"> 🡠 </button>
                    <button v-on:click="forwards" class="btn btn-primary"> 🡢 </button>
                </center>
            </div>
    
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            addresses: [],
            title: "All Addresses",
            page_num: 0,
            last_page: 0,
            init: true,
            user_id: null,
            show: false,
            err_msg: null
        }
    },
    mounted() {
        this.user_id = this.$route.params.user_id;
        this.forwards();
    },

    methods: {
        loadAddresses: function(direction) {
            //get Request
            //assign results
            //catch $errors
            let self = this
            if (direction == 'right') this.page_num++;
            else this.page_num--;
            axios.get('/fetch-user-addresses/' + this.user_id + '/?page=' + this.page_num)
                .then((response) => {
                    //check existence of data before assigning
                    if (response.data) {
                        this.last_page = response.data.last_page;
                        this.addresses = response.data.data; //data.data because paginated eloquent returns a different object than a direct call
                    }
                })
                .catch(function(error) {
                    if (error.response.status === 404) {
                        self.show = true;
                        self.err_msg = "User not found";
                    }
                });
        },
        forwards: function() {
            if (this.init) //initial run
            {
                this.init = false
                this.loadAddresses('right')
            } else if (this.page_num != this.last_page)
                this.loadAddresses('right')
            else
            ;
        },
        backwards: function() {
            this.loadAddresses('left')
        }


    }
}
</script>

<style scoped>
@import "styles/display-addresses-card.css"
</style>
