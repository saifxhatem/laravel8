<template>
    <div>
        <br/><br/>
        <success-alert v-if="success" message="Insertion Successful" />
        <error-alert v-if="show" message="Insertion Failed:" :error="err_msg"> </error-alert>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add New Area</div>
    
                        <div class="card-body">
                            <form @submit.prevent="validate_form" method="post">
                                <div class="form-group">
                                    <label for="user-name-label">Area Name</label>
                                    <input type="text" class="form-control" v-bind:class="{ 'is-invalid' : validation_errors.area_name_failed}" id="area" placeholder="Ex: Heliopolis" v-model="formData.area_name" />
                                </div>
                                <button type="submit" class="btn btn-primary">Add Area</button>
    
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


    mounted(){
        this.formData.governorate_id = this.$route.params.gov_id;
    },

    data() {
        return {
            formData: {
                area_name: null,
                governorate_id: null
            },
            validation_errors: {
                area_name_failed: null,
                governorate_id_failed: null
            },
            show: false,
            err_msg: null,
            success: null,
            
        }


    },



    methods: {
        postData(e) {
            let self = this;            
            axios.post("add-new-area", this.formData)
                .then((result) => {
                    self.show = false;
                    self.success = true;
                })
                .catch(function(error) {
                    self.show = true;                    
                    if (error.response.status == 422)
                        self.err_msg = error.response.data.errors.area_name[0];
                });
        },
        validate_form(){
            this.clear_validation_flags();
            if (this.formData.area_name === null || this.formData.area_name === '') {
                this.show = true;
                this.err_msg += "Area name cannnot be empty."
                this.validation_errors.area_name_failed = true;
            }
            if (this.formData.governorate_id === null || this.formData.governorate_id === '') {
                this.show = true;
                this.err_msg += " Governorate ID was not assigned."
                this.validation_errors.governorate_id_failed = true;
            }
            if (!this.validation_errors.area_name_failed && !this.validation_errors.governorate_id_failed){
                this.show = false;
                this.err_msg = "";
                this.postData()
            }
        },
        clear_validation_flags() {
            this.err_msg = "";
            this.success = false;
            this.validation_errors.area_name_failed = null;
            this.validation_errors.governorate_id_failed = null;
        }
    }
}
</script>
