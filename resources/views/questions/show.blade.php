@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h3>{{ $question->title }}</h3>
                                <div class="ml-auto">
                                    <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Browse
                                        Questions</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a
                                    title="This question is useful"
                                    class="vote-up {{ Auth::guest() ? 'off' : '' }}"
                                    href="javascript:{}"
                                    onclick="document.getElementById('upvote-question-{{ $question->id }}').submit()"
                                >
                                    <i class="fas fa-caret-up fa-3x"></i>
                                </a>
                                <form style="display: none" id="upvote-question-{{ $question->id }}"
                                      action="/questions/{{ $question->id }}/vote" method="POST">
                                    @csrf
                                    <input type="hidden" name="vote" value="1">
                                </form>
                                <span class="vote-count">{{ $question->votes_count }}</span>
                                <a
                                    title="This question is not useful"
                                    class="vote-down {{ Auth::guest() ? 'off' : '' }}"
                                    href="javascript:{}"
                                    onclick="document.getElementById('downvote-question-{{ $question->id }}').submit()"
                                >
                                    <i class="fas fa-caret-down fa-3x"></i>
                                </a>
                                <form style="display: none" id="downvote-question-{{ $question->id }}"
                                      action="/questions/{{ $question->id }}/vote" method="POST">
                                    @csrf
                                    <input type="hidden" name="vote" value="-1">
                                </form>
                                <a
                                    title="Click to mark as favorite!"
                                    class="favorite mt-2 {{ Auth::guest() ? 'off' : ($question->is_favorite ? 'favorited' : '') }}"
                                    href="javascript:{}"
                                    onclick="document.getElementById('favorite-question-{{ $question->id }}').submit()"
                                >
                                    <i class="fas fa-star fa-2x"></i>
                                    <span class="favorites-count">{{ $question->favoritesCount }}</span>
                                </a>
                                <form style="display: none" id="favorite-question-{{ $question->id }}"
                                      action="/questions/{{ $question->id }}/favorites" method="POST">
                                    @csrf
                                    @if($question->is_favorite)
                                        @method('DELETE')
                                    @endif
                                </form>
                            </div>
                            <div class="media-body">
                                {!! $question->body_html !!}
                                <div class="float-right">
                                    <span class="text-muted">Asked {{ $question->created_date }}</span>
                                    <div class="media mt-2">
                                        <a href="{{ $question->user->url }}" class="pr-2">
                                            <img src="{{ $question->user->avatar }}" alt="{{ $question->user->name }}">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('answers._index', [
            'answers' => $question->answers,
            'answersCount' => $question->answer_count,
        ])

        @include('answers._create')
    </div>
@endsection
