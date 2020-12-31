@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Questions') }}</div>

                <div class="card-body">
                    @foreach ($questions as $question)
                    <div class="media">
                        <div class="media-body">
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
                    {{ $questions->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
