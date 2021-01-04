@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- Question --}}
        <div class="col-md-12">
            <div class="card">
                {{-- Header --}}
                <div class="card-header d-flex">
                    <h3 class="mr-auto">{{ $question->title }} </h3>
                    <div class="ml-auto">
                        <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to All
                            Questions</a>
                    </div>
                </div>

                {{-- Question Body --}}
                <div class="card-body">
                    {!! $question->body_html !!}
                </div>
            </div>
        </div>

        {{-- Answers --}}
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-body">
                    {{-- Header --}}
                    <div class="card-title">
                        <h3>
                            {{ $question->answers_count . Str::plural(' Answer', $question->answers_count) }}</h3>
                        </h3>
                    </div>
                    <hr>

                    {{-- Answers Body --}}
                    @foreach ($question->answers as $answer)
                    <div class="media">
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                <div class="media mt-2">
                                    <a href="{{ $answer->user->url }}" class="pr-2">
                                        <img src="{{ $answer->user->avatar }}">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection
