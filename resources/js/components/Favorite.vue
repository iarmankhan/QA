<template>
    <a title="Click to mark as favorite! (click again to undo)"
       :class="classes" @click.prevent="toggle">
        <i class="fas fa-star fa-2x"></i>
        <span class="favorites-count">{{ this.count }}</span>
    </a>
</template>

<script>
    export default {
        props: ['question'],

        data() {
            return {
                isFavorite: this.question.is_favorite,
                count: this.question.favorites_count,
                id: this.question.id
            }
        },

        methods: {
            toggle() {
                if(! this.signedIn){
                    this.$toast.warning('Please login to favorite this question', 'Warning', {
                        timeout: 3000,
                        position: 'bottomLeft'
                    });
                    return;
                }
                this.isFavorite ? this.destroy() : this.create();
            },
            destroy() {
                axios.delete(this.endpoint).then(res => {
                    this.count--;
                    this.isFavorite = false;
                });
            },
            create() {
                axios.post(this.endpoint).then(res => {
                    this.count++;
                    this.isFavorite = true;
                });
            }
        },

        computed: {
            classes() {
                return [
                    'favorite',
                    'mt-2',
                    !this.signedIn ? 'off' : (this.isFavorite ? 'favorited' : '')
                ];
            },
            endpoint() {
                return `/questions/${this.id}/favorites`;
            },
        }
    }
</script>
