@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>Editing answer for question: <strong>{{ $question->title }}</strong></h2>
                        </div>
                        <hr>
                        <form action="{{ route('questions.answers.update', [$question->id, $answer->id]) }}"
                              method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="7">
                                    {{ old('body', $answer->body) }}
                                </textarea>
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-outline-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
