<template>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>Your Answer</h3>
                    </div>
                    <hr>
                    <form @submit.prevent="create">
                        <div class="form-group">
                            <textarea required class="form-control" v-model="body" id="body" name="body" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" :disabled="isInvalid" class="btn btn-lg btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['questionId'],

        data() {
            return{
                body: '',
            }
        },

        methods: {
            create() {
                axios.post(`/questions/${this.questionId}/answers`, {
                    body: this.body
                }).then(({data}) => {
                    this.$toast.success(data.message, "Success", {});
                    this.body = '';
                    this.$emit('created', data.answer);
                }).catch(err => {
                    this.$toast.error(err.response.data.message, "Error", {});
                });
            }
        },

        computed: {
            isInvalid() {
                return !this.signedIn || this.body.length < 10;
            }
        }
    }
</script>
