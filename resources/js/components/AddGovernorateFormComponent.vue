<template>
    <div>
        <br/><br/>
        <success-alert v-if="success" message="Insertion Successful" />
        <error-alert v-if="show" message="Insertion Failed:" :error="err_msg"> </error-alert>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add New Governorate</div>
    
                        <div class="card-body">
                            <form @submit.prevent="validate_form" method="post">
                                <div class="form-group">
                                    <label for="user-name-label">Governorate Name</label>
                                    <input type="text" class="form-control" v-bind:class="{ 'is-invalid' : validation_errors.governorate_name_failed}" id="governorate" placeholder="Ex: Cairo" v-model="formData.governorate_name" />
                                </div>
                                <button type="submit" class="btn btn-primary">Add Governorate</button>
    
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



    data() {
        return {
            formData: {
                governorate_name: null
            },
            validation_errors: {
                governorate_name_failed: null
            },
            show: false,
            err_msg: null,
            success: null,
            
        }


    },



    methods: {
        postData(e) {
            let self = this;
            axios.post("add-new-gov", this.formData)
                .then((result) => {
                    self.show = false;
                    self.success = true;
                })
                .catch(function(error) {
                    self.show = true;
                    if (error.response.status == 422)
                        self.err_msg = error.response.data.errors.governorate_name[0];
                });
        },
        validate_form(){
            this.clear_validation_flags();
            if (this.formData.governorate_name === null || this.formData.governorate_name === '') {
                this.show = true;
                this.err_msg += "Governorate name cannnot be empty."
                this.validation_errors.governorate_name_failed = true;
            }
            if (!this.validation_errors.governorate_name_failed){
                this.show = false;
                this.err_msg = "";
                this.postData()
            }
        },
        clear_validation_flags() {
            this.err_msg = "";
            this.success = false;
            this.validation_errors.governorate_name_failed = null;
        }

    }
}
</script>
