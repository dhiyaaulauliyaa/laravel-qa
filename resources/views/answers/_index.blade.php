<div class="col-md-12 mt-4">
    <div class="card">
        <div class="card-body">
            {{-- Header --}}
            <div class="card-title">
                <h3>
                    {{ $answersCount . Str::plural(' Answer', $answersCount) }}</h3>
                </h3>
            </div>
            <hr>

            {{-- Flash message --}}
            @include('layouts._messages')

            {{-- Answers Body --}}
            @foreach ($answers as $answer)
            <div class="media">

                <div class="d-flex flex-column vote-controls">
                    <a title="This answer is useful" class="vote-up">
                        <i class="fa fa-caret-up fa-3x"></i>
                    </a>
                    <span class="votes-count">1230</span>
                    <a title="This answer is not useful" class="vote-down off">
                        <i class="fa fa-caret-down fa-3x"></i>
                    </a>
                    <a title="Mark this answer as best answer" class="vote-accepted mt-2">
                        <i class="fa fa-check fa-2x"></i>
                    </a>
                </div>
                <div class="media-body">
                    <div class="ml-auto">
                        {{-- Edit Answer --}}
                        @can('update', $answer)
                        <a href="{{ route('questions.answers.update', [$answer->question_id, $answer->id]) }}"
                            class="btn btn-md btn-outline-info">Edit</a>

                        @endcan

                        {{-- Delete Answer --}}
                        @can('delete', $answer)
                        <form class="form-delete" method="post"
                            action="{{ route('questions.answers.destroy', [$answer->question_id, $answer->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-md btn-outline-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        @endcan
                    </div>
                    {!! $answer->body_html !!}
                    <div class="float-left margin-top:-0.5em">
                        <hr>
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
