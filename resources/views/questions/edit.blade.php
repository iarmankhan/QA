@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>Edit Question</h3>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Browse Questions</a>
                            </div>
                        </div>


                    </div>

                    <div class="card-body">
                        <form action="{{ route('questions.update', $question->id) }}" method="POST">
                            @method('PATCH')
                            @include('questions._form', ['buttonText' => 'Update Question'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
