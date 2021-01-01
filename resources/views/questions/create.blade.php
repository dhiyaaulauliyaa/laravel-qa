@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- Header --}}
                <div class="card-header d-flex">
                    <h3 class="mr-auto">All Questions </h3>
                    <div class="ml-auto">
                        <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>
                    </div>
                </div>

                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
