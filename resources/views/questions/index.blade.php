@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>All Questions</h3>
                            <div class="ml-auto">
                                <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask a
                                    Question</a>
                            </div>
                        </div>


                    </div>

                    <div class="card-body">
                        @include('layouts._messages')
                        @forelse($questions as $question)
                            @include('questions._question')
                        @empty
                            <div class="alert alert-warning">
                                <strong>Sorry</strong> There are no questions available!
                            </div>
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
