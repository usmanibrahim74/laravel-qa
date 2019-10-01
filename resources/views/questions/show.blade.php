@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question->title }}</h1>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary ">Back To All Questions</a>
                            </div>
                        </div>
    
                    </div>
                    <hr>
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a href="" title="This question is useful" 
                                class="vote-up {{Auth::guest()?'off':''}}"
                                onclick="event.preventDefault(); document.getElementById('up-vote-question-{{$question->id}}').submit();"
                                >
                                <form class="d-none" method="POST" action="{{ route('questions.vote', $question->id) }}" id="up-vote-question-{{ $question->id }}">
                                    @csrf
                                    <input type="hidden" name="vote" value="1">
                                </form>
                                <i class="fas fa-3x fa-caret-up"></i>
                            </a>
                            <span class="votes-count">{{$question->votes_count}}</span>
                            <a href="" title="This question is not useful"
                                class="vote-down {{Auth::guest()?'off':''}}"
                                onclick="event.preventDefault(); document.getElementById('down-vote-question-{{$question->id}}').submit();"
                                >
                                <form class="d-none" method="POST" action="{{ route('questions.vote', $question->id) }}" id="down-vote-question-{{ $question->id }}">
                                    @csrf
                                    <input type="hidden" name="vote" value="-1">
                                </form>
                                <i class="fas fa-3x fa-caret-down"></i>
                            </a>
                            <a href="" title="Click to mark as favorite question (Click agin to undo)" 
                            class="favorite mt-2 {{Auth::guest()?'off':($question->is_favorited?'favorited':'')}} "
                            onclick="event.preventDefault(); document.getElementById('favorite-question-{{$question->id}}').submit();"
                            >
                                <i class="fas fa-2x fa-star"></i>
                            <span class="favorites-count">{{ $question->favorites_count }}</span>
                            </a>
                        <form class="d-none" method="POST" action="{{ route('questions.favorite', $question->id) }}" id="favorite-question-{{ $question->id }}">
                                @csrf
                                @if ($question->is_favorited)
                                    @method('DELETE')
                                @endif
                            </form>

                        </div>
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Asked {{ $question->created_date }}</span>
                                <div class="media mt-2">
                                    <a href="{{ $question->user->url }}" class="pr-2">
                                        <img src="{{ $question->user->avatar }}" alt="">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('answers._index',[
            'answers_count' => $question->answers_count,
            'answers' => $question->answers,
        ])
    @include('answers._create')
</div>
@endsection
