<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answers_count." ". Str::plural('Answer',$answers_count) }}</h2>
                </div>
                @include('layouts._messages')
                @foreach ($answers as $answer)
                <hr>
                    <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a href="" title="This answer is useful" 
                                    class="vote-up {{Auth::guest()?'off':''}}"
                                    onclick="event.preventDefault(); document.getElementById('up-vote-answer-{{$answer->id}}').submit();"
                                    >
                                    <form class="d-none" method="POST" action="{{ route('answers.vote', $answer->id) }}" id="up-vote-answer-{{ $answer->id }}">
                                        @csrf
                                        <input type="hidden" name="vote" value="1">
                                    </form>
                                    <i class="fas fa-3x fa-caret-up"></i>
                                </a>
                                <span class="votes-count">{{$answer->votes_count}}</span>
                                <a href="" title="This answer is not useful"
                                    class="vote-down {{Auth::guest()?'off':''}}"
                                    onclick="event.preventDefault(); document.getElementById('down-vote-answer-{{$answer->id}}').submit();"
                                    >
                                    <form class="d-none" method="POST" action="{{ route('answers.vote', $answer->id) }}" id="down-vote-answer-{{ $answer->id }}">
                                        @csrf
                                        <input type="hidden" name="vote" value="-1">
                                    </form>
                                    <i class="fas fa-3x fa-caret-down"></i>
                                </a>
                                @can('accept', $answer)
                                    <a href="" title="Mark this answer as best answer" 
                                    class="{{ $answer->status }} mt-2"
                                    onclick="event.preventDefault(); document.getElementById('accept-answer-{{$answer->id}}').submit();"
                                    >
                                        <i class="fas fa-2x fa-check"></i>
                                    </a>
                                    <form class="d-none" method="POST" action="{{ route('answers.accept',$answer->id) }}" id="accept-answer-{{ $answer->id }}">
                                        @csrf
                                    </form>
                                @else
                                    @if ($answer->is_best)
                                        <a href="" title="The question owner accepted this answer as best answer" 
                                        class="{{ $answer->status }} mt-2">
                                            <i class="fas fa-2x fa-check"></i>
                                        </a>
                                    @endif    
                                @endcan
                                
    
                            </div>
                        <div class="media-body">  
                            {!! $answer->body_html !!}
                            <div class="row">
                                <div class="col-4">
                                        <div class="ml-auto">
                                            @can ('update', $answer)
                                            <a href=" {{ route('questions.answers.edit', [$answer->id, $answer->id]) }} " class="btn btn-sm btn-outline-info">Edit</a>
                                            @endcan
                                            @can ('delete', $answer)
                                            <form action=" {{ route('questions.answers.destroy', [$answer->id, $answer->id]) }} " method="post" class="d-inline">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <input type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')" value="Delete">
                                            </form>
                                            @endcan                                       
                                        </div>
                                </div>
                                <div class="col-4">

                                </div>
                                <div class="col-4">
                                    <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                    <div class="media mt-2">
                                        <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" alt="">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>