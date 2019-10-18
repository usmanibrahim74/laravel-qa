@can('accept', $model)
    <a href="" title="Mark this answer as best answer" 
    class="{{ $model->status }} mt-2"
    onclick="event.preventDefault(); document.getElementById('accept-answer-{{$model->id}}').submit();"
    >
        <i class="fas fa-2x fa-check"></i>
    </a>
    <form class="d-none" method="POST" action="{{ route('answers.accept',$model->id) }}" id="accept-answer-{{ $model->id }}">
        @csrf
    </form>
@else
    @if ($model->is_best)
        <a href="" title="The question owner accepted this answer as best answer" 
        class="{{ $model->status }} mt-2">
            <i class="fas fa-2x fa-check"></i>
        </a>
    @endif    
@endcan