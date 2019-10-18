@if ($model instanceof App\Question)
    @php
        $name = 'question';
        $firstURISegment='questions';
    @endphp
@elseif ($model instanceof App\Answer)
    @php
        $name = 'answer';
        $firstURISegment='answers';
    @endphp
@endif
<div class="d-flex flex-column vote-controls">
    <a href="" title="This {{$name}} is useful" 
        class="vote-up {{Auth::guest()?'off':''}}"
        onclick="event.preventDefault(); document.getElementById('up-vote-question-{{$model->id}}').submit();"
        >
        <form class="d-none" method="POST" action="{{ route($firstURISegment.'.vote', $model->id) }}" id="up-vote-question-{{ $model->id }}">
            @csrf
            <input type="hidden" name="vote" value="1">
        </form>
        <i class="fas fa-3x fa-caret-up"></i>
    </a>
    <span class="votes-count">{{$model->votes_count}}</span>
    <a href="" title="This {{$name}} is not useful"
        class="vote-down {{Auth::guest()?'off':''}}"
        onclick="event.preventDefault(); document.getElementById('down-vote-{{$name}}-{{$model->id}}').submit();"
        >
        <form class="d-none" method="POST" action="{{ route($firstURISegment.'.vote', $model->id) }}" id="down-vote-{{$name}}-{{ $model->id }}">
            @csrf
            <input type="hidden" name="vote" value="-1">
        </form>
        <i class="fas fa-3x fa-caret-down"></i>
    </a>
    @if ($model instanceof App\Question)
        @include('shared._favorite',[
            'model' => $model
        ])
    @elseif($model instanceof App\Answer)

        @include('shared._accept',[
            'model' => $model
        ])

    @endif

</div>