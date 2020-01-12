<a
    title="Click to mark as favorite!"
    class="favorite mt-2 {{ Auth::guest() ? 'off' : ($model->is_favorite ? 'favorited' : '') }}"
    href="javascript:{}"
    onclick="document.getElementById('favorite-question-{{ $model->id }}').submit()"
>
    <i class="fas fa-star fa-2x"></i>
    <span class="favorites-count">{{ $model->favoritesCount }}</span>
</a>
<form style="display: none" id="favorite-question-{{ $model->id }}"
      action="/questions/{{ $model->id }}/favorites" method="POST">
    @csrf
    @if($model->is_favorite)
        @method('DELETE')
    @endif
</form>
