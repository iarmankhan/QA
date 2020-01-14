<template>
    <div>
        <a v-if="canAccept" title="Mark this answer as best answer!" :class="classes" @click.prevent="create">
            <i class="fas fa-check fa-2x"></i>
        </a>
        <a v-if="accepted" title="Accepted answer!" :class="classes">
            <i class="fas fa-check fa-2x"></i>
        </a>

    </div>
</template>

<script>
    export default {
        props: ['answer'],

        data() {
            return {
                isBest: this.answer.is_best,
                id: this.answer.id
            }
        },

        methods: {
            create() {
                axios.post(this.endpoint).then(res => {
                    this.$toast.success(res.data.message, "Success", {
                        timeout: 3000,
                        position: 'bottomLeft'
                    });

                    this.isBest = true;
                })
            }
        },

        computed: {
            canAccept() {
                return this.authorize('accept', this.answer);
            },

            accepted() {
                return !this.canAccept && this.isBest;
            },

            classes() {
                return [
                    'mt-2',
                    this.isBest ? 'vote-accepted' : ''
                ];
            },

            endpoint() {
                return `/answers/${this.id}/accept`
            }
        }
    }
</script>
