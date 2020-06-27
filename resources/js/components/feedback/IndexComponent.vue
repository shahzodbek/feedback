<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Feedback form.</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="col-md-8 offset-2">
                                <form @submit="formSubmit">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" id="name" v-model="name" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="text" id="phone" v-model="phone" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Message:</label>
                                        <textarea id="message" class="form-control" v-model="message" rows="7"></textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <input type="submit"class="btn btn-info" value="Send"/>
                                    </div>
                                </form>
                            </div>
                            <div v-if="response.errors">
                                <div v-for="error in response.errors">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{error[0]}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div v-if="response.message">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{response.message}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
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
            console.log('Component mounted.')
        },
        data() {
            return {
                name: '',
                phone: '',
                message:'',
                response:''
            };
        },
        methods: {
            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;
                axios.post('/api/feedback', {
                    name: this.name,
                    phone: this.phone,
                    message: this.message,
                })
                    .then(function (response) {
                        currentObj.response = response.data;
                    })
                    .catch(function (error) {
                        currentObj.response = error.response.data;
                    });
            }
        }
    }
</script>
