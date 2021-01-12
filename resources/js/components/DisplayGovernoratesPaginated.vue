<template>
    <div class="card" id="card-styled">
        <div class="card-header text-center font-weight-bold">
            <vue-header :title="this.title" />
    
    
            <br />
    
            <ul id="example-1">
                <li id="li-styled" v-for="(governorate,index) in governorates" :key="index">
                    {{ governorate.name }}
                </li>
    
            </ul>
            <center>
                <button v-on:click="backwards" class="btn btn-primary"> 🡠 </button>
                <button v-on:click="forwards" class="btn btn-primary"> 🡢 </button>
            </center>
        </div>
    
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            governorates: [],
            title: "All Governorates",
            page_num: 0,
            last_page: 0,
            init: true
        }
    },
    mounted() {

        this.forwards();
    },

    methods: {
        loadGovernorates: function(direction) {
            //get Request
            //assign results
            //catch $errors
            if (direction == 'right') this.page_num++;
            else this.page_num--;
            axios.get('/list-all-govs-paginated/?page=' + this.page_num)
                .then((response) => {
                    //check existence of data before assigning

                    if (response.data) {

                        this.last_page = response.data.last_page;
                        this.governorates = response.data.data; //data.data because paginated eloquent returns a different object than a direct call
                    }
                })
                .catch(function(error) {

                });
        },
        forwards: function() {
            if (this.init) //initial run
            {
                this.init = false
                this.loadGovernorates('right')
            } else if (this.page_num != this.last_page)
                this.loadGovernorates('right')
            else
            ;
        },
        backwards: function() {
            this.loadGovernorates('left')
        }


    }
}
</script>

<style scoped>
@import "styles/display-addresses-card.css"
</style>
