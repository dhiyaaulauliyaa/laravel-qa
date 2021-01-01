@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- Header --}}
                <div class="card-header d-flex">
                    <h3 class="mr-auto">Ask Questions </h3>
                    <div class="ml-auto">
                        <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to All
                            Questions</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('questions.update', $question->id) }}" method="post">
                        @method("PUT")
                        @include('questions._form', ['buttonText'=>'Update Question'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
