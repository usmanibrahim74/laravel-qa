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
                                <a href="" title="This question is useful" class="vote-up">
                                    <i class="fas fa-3x fa-caret-up"></i>
                                </a>
                                <span class="votes-count">12</span>
                                <a href="" title="This question is not useful" class="vote-down off">
                                    <i class="fas fa-3x fa-caret-down"></i>
                                </a>
                                <a href="" title="Mark this answer as best answer" class="vote-accepted mt-2">
                                    <i class="fas fa-2x fa-check"></i>
                                </a>
    
                            </div>
                        <div class="media-body">  
                            {!! $answer->body_html !!}
                            <div class="float-right">
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
                @endforeach
            </div>
        </div>
    </div>
</div>