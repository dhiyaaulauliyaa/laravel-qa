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
                    @foreach ($questions as $question)
                    <div class="d-flex media">

                        {{-- Left Side --}}
                        <div class="flex-4 counters">
                            <div class="d-flex flex-column">
                                <div class="vote">
                                    <strong>{{ $question->votes }}</strong>
                                    {{ Str::plural('vote', $question->votes) }}
                                </div>
                                <div class="status {{ $question->status }}">
                                    <strong>{{ $question->answers }}</strong>
                                    {{ Str::plural('answer', $question->answers) }}
                                </div>
                                <div class="view">
                                    {{ $question->views . " " . Str::plural('view', $question->views) }}
                                </div>
                            </div>
                        </div>

                        {{-- Questions --}}
                        <div class="flex-fill media-body">
                            <h3 class="mt-0">
                                <a href="{{ $question->url }}">{{  $question->title }}</a>
                            </h3>
                            <p>Asked by
                                <a href="{{ $question->user->url }}">{{ $question->user->name }} </a>
                                • {{ $question->created_date }}
                            </p>
                            {{ Str::limit($question->body, 300) }}
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    
                    {{-- Pagination --}}
                    {{ $questions->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
