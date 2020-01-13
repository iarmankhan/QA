<answer :answer="{{ $answer }}" inline-template>
    <div class="media post">
        @include('shared._vote', [
               'model'=> $answer
        ])
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
                            @can('update', $answer)
                                <a @click.prevent="edit"
                                   class="btn btn-sm btn-outline-info">Edit</a>
                            @endcan

                            @can('delete', $answer)
                                <form class="form-delete"
                                      action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}"
                                      method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm"
                                            onclick="confirm('Are you sure?')">Delete
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        <user-info :model="{{ $answer }}" label="Answered"></user-info>
                    </div>
                </div>
            </div>
        </div>
    </div>

</answer>
