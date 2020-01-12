@can('accept', $model)
    <a
        title="Mark this answer as best answer!"
        class="{{ $model->status }} mt-2"
        href="javascript:{}"
        onclick="document.getElementById('accept-answer-{{ $model->id }}').submit()"
    >
        <i class="fas fa-check fa-2x"></i>
    </a>
    <form style="display: none" id="accept-answer-{{ $model->id }}" action="{{ route('answers.accept', $model->id) }}" method="POST">
        @csrf
    </form>
@else
    @if($model->is_best)
        <a
            title="Accepted answer!"
            class="{{ $model->status }} mt-2"
        >
            <i class="fas fa-check fa-2x"></i>
        </a>
    @endif
@endcan
