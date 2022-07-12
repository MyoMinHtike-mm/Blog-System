@extends ('layouts.app');

@section('content');

<div class="container">

    @if(session('info'))

    <div class="alert alert-warning">
        {{ session('info') }}
    </div>

    @endif



    <div class="card text-info" style="width: 600px; margin: 0px auto">
        <div class="card-body bg-dark">
            <h4 class="card-title">
                {{ $article->title }}
            </h4>
            <small>
                {{ $article->created_at->diffForHumans() }}
            </small>
            <p>
                {{ $article->body }}

            </p>
                <div class="d-flex justify-content-between">

                 <div class="article-details">
                    <div class="small">category: ( {{ $article->category->name }} )</div>
                    <div class="small">article_id: ( {{ $article->id }} )</div>
            
                 </div>
                @auth
                    <div class="article-delete-btn">
                        <a href="{{ url("articles/delete/$article->id") }}" class="btn btn-danger">
                            Delete
                        </a>
                    </div>
                 @endauth
                     
                </div>
           
        </div>
        <div style="height: 200px;overflow: scroll;">
            <ul class="list-group">
                <li class="list-group-item active">
                    <b>Comments ( {{ count($article->comments) }} ) </b>
                </li>
            @foreach($article->comments as $comment)
            <li class="list-group-item">
                <a href=" {{ url("comments/delete/$comment->id") }}" class="btn-close float-end"></a>
                {{ $comment->comment }}
                <div class="small mt-2"> 
                    By <b>{{ $comment->user->name }}</b>,
                    {{ $comment->created_at->diffForHumans() }}
                </div>
            </li>
     
    
            @endforeach
            </ul>
    
        </div>

        @auth
        <form action="{{ url('/comments/add')}}" method="post">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea class="form-control" name="comment" placeholder="new comment"></textarea>
            <input type="submit" value="add comment" class="form-control btn btn-primary">
        </form>
        @endauth

    </div>

    

       
</div>

@endsection