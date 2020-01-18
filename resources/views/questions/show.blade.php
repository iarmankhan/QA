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
                            <vote :model="{{ $question }}" name="question"></vote>
                            <div class="media-body">
                                {!! $question->body_html !!}
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <user-info :model="{{ $question }}" label="Asked By"></user-info>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <answers :question="{{ $question }}"></answers>

        @include('answers._create')
    </div>
@endsection
