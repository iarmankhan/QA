<template>
    <div class="media post">
        <vote :model="answer" name="answer"></vote>
        <div class="media-body">
            <form v-if="editing" @submit.prevent="update">
                <div class="form-group">
                    <textarea required class="form-control" v-model="body" rows="10"></textarea>
                </div>
                <button class="btn btn-outline-primary btn-sm" :disabled="isInvalid">Update</button>
                <button @click="cancel" class="btn btn-outline-dark btn-sm" type="button">Cancel</button>
            </form>
            <div v-else>
                <div v-html="bodyHtml"></div>
                <div class="row">
                    <div class="col-4">
                        <div class="ml-auto">
                            <a v-if="authorize('modify', answer)" @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
                            <button v-if="authorize('modify', answer)" class="btn btn-outline-danger btn-sm" @click="destroy">Delete</button>
                        </div>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        <user-info :model="answer" label="Answered"></user-info>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vote from './Vote';
    import UserInfo from './UserInfo';
    import modification from "../mixins/modification";

    export default {
        props: ['answer'],

        mixins: [modification],

        components: {
            Vote,
            UserInfo
        },
        data () {
            return {
                body: this.answer.body,
                bodyHtml: this.answer.body_html,
                id: this.answer.id,
                questionId: this.answer.question_id,
                beforeEditCache: null
            }
        },
        methods: {
            restoreFromCache() {
                this.body = this.beforeEditCache;
            },

            setEditCache() {
                this.beforeEditCache = this.body;
            },

            payload() {
                return {body: this.body}
            },
            delete() {
                axios.delete(this.endpoint).then(res => {
                    this.$emit('deleted');
                    this.$toast.success(res.data.message, "Success", {timeout: 2000});
                });
            },
        },
        computed: {
            isInvalid() {
                return this.body.length < 10;
            },
            endpoint() {
                return `/questions/${this.questionId}/answers/${this.id}`;
            }
        }
    }
</script>
