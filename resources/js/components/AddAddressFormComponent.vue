<template>
    <div>
        <br /><br />
        <error-alert v-if="show" message="Error" :error="err_msg"> </error-alert>
        <success-alert v-if="success" message="Address Added Successfully" />
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add New Address</div>
    
                        <div class="card-body">
                            <form @submit.prevent="validate_form" method="post">
                                <div class="form-group">
                                    <label for="user-name-label">Address </label>
                                    <input type="text" class="form-control" v-bind:class="{ 'is-invalid' : validation_errors.address_failed}" id="address" placeholder="Ex: 19 Hosny El Ashmawy" v-model="formData.address" />
                                </div>
    
                                <select v-model="formData.governorate_id" @change="chosen_governorate" name="governorate" id="governorate" v-bind:class="{ 'is-invalid' : validation_errors.governorate_failed}" class="form-control" tabindex="12">
                                          <option
                                            v-for="(governorate, index) in all_governorates"
                                            :key="index"
                                            :value="governorate.id"
                                          >
                                            {{ governorate.name }}
                                          </option>
                                        </select>
                                <br>
                                <div v-if="show_areas_form">
                                    <select v-model="formData.area_id" name="areas" id="areas" class="form-control" v-bind:class="{ 'is-invalid' : validation_errors.area_id_failed}" tabindex="12">
                                          <option
                                            v-for="(area, index) in areas_in_selected_gov"
                                            :key="index"
                                            :value="area.id"
                                            
                                          >
                                            {{ area.name }}
                                          </option>
                                          
                                        </select>
                                </div>
                                <div v-if="formData.governorate_id">
                                    <center>
                                        Can't find your area? <br> <button v-on:click="add_area" type="button" class="btn btn-primary">
                                            Add New Area
                                          </button>
                                    </center>
                                </div>
    
                                <center>
                                    <button type="submit" class="btn btn-primary">
                                            Add Address
                                          </button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {


    mounted() {

        this.load_governorates()
    },

    data() {
        return {
            formData: {
                user_id: null,
                address: null,
                governorate_id: null,
                area_id: null
            },
            validation_errors: {
                user_id_failed: null,
                address_failed: null,
                governorate_failed: null,
                area_id_failed: null
            },
            show: false,
            err_msg: "",
            all_governorates: null, //not empty
            areas_in_selected_gov: null,
            show_areas_form: null,
            success: null
        }


    },



    methods: {
        postData(e) {
            
            axios.post("store-data", this.formData)
                .then((result) => {
                    this.success = true;
                    this.clear_form_variables();
                })
                .catch((error) => {
                });
        },
        load_governorates() {

            axios.get("list-all-govs")
                .then((result) => {
                    this.all_governorates = result.data;
                })
        },
        chosen_governorate() {
            this.success = false;
            //this.formData.area_id = null;

            axios.get("get-areas-in-gov/" + this.formData.governorate_id)
                .then((result) => {
                    if (result.data.length > 0) {
                        this.show = false;
                        this.areas_in_selected_gov = result.data;
                        this.show_areas_form = true;
                    } else {
                        this.show = true;
                        this.err_msg = "This governorate has no areas, please choose a different one or add a new area"
                        this.areas_in_selected_gov = null;

                    }
                })


        },
        add_area() {
            this.$router.push({ name: 'add-area', params: { gov_id: this.formData.governorate_id } })
        },
        validate_form() {
            //clear flags from previous runs
            this.clear_validation_flags();
            //bind user
            this.formData.user_id = this.$route.params.user_id;

            if (this.formData.user_id === null || this.formData.user_id === '') {
                this.show = true;
                this.err_msg += "User ID not assigned"
                this.validation_errors.user_id_failed = true;
            }
            if (this.formData.address === null || this.formData.address === '') {
                this.show = true;
                this.err_msg += " Address cannot be empty."
                this.validation_errors.address_failed = true;
            }
            if (this.formData.governorate_id === null || this.formData.governorate_id === '') {
                this.show = true;
                this.err_msg += " No governorate selected."
                this.validation_errors.governorate_failed = true;
            }
            if (this.formData.area_id === null || this.formData.area_id === '') {
                this.show = true;
                this.err_msg += " No area selected."
                this.validation_errors.area_id_failed = true;
            }
            if (!this.validation_errors.user_id_failed && !this.validation_errors.address_failed && !this.validation_errors.governorate_failed && !this.validation_errors.area_id_failed) {
                this.show = false;
                this.err_msg = "";
                this.postData()
            }
        },
        clear_validation_flags() {
            this.err_msg = "";
            this.show = false;
            this.success = false;
            this.validation_errors.user_id_failed = null;
            this.validation_errors.address_failed = null;
            this.validation_errors.governorate_failed = null;
            this.validation_errors.area_id_failed = null;
        },
        clear_form_variables() {
            this.formData.user_id = null;
            this.formData.address = null;
            this.formData.governorate_id = null;
            this.formData.area_id = null;
            this.areas_in_selected_gov = null;
        }
    }
}
</script>
