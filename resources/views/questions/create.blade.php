@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>Ask Question</h3>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Browse Questions</a>
                            </div>
                        </div>


                    </div>

                    <div class="card-body">
                        <form action="{{ route('questions.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="question-title">Question Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="question-title" name="title" placeholder="Enter title">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="question-body">Explain your question</label>
                                <textarea class="form-control @error('body') is-invalid @enderror" rows="10" id="question-body" name="body" placeholder="Describe your question">{{ old('body') }}</textarea>
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Post Question</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
