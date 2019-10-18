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
                            @include('shared._vote',[
                                'model' => $answer
                            ])
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
                                    
                                    @include('shared._author', [
                                        'model' => $answer,
                                        'label' => 'Answered',
                                    ])

                                </div>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>