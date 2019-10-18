<a href="" title="Click to mark as favorite question (Click agin to undo)" 
    class="favorite mt-2 {{Auth::guest()?'off':($model->is_favorited?'favorited':'')}} "
    onclick="event.preventDefault(); document.getElementById('favorite-question-{{$model->id}}').submit();"
    >
    <i class="fas fa-2x fa-star"></i>
    <span class="favorites-count">{{ $model->favorites_count }}</span>
</a>
<form class="d-none" method="POST" action="{{ route('questions.favorite', $model->id) }}" id="favorite-question-{{ $model->id }}">
    @csrf
    @if ($model->is_favorited)
        @method('DELETE')
    @endif
</form>