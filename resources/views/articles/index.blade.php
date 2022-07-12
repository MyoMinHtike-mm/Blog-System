@extends ('layouts.app');

@section("content");

    <div class="container">


      

        @if(session('info'))

            <div class="alert-warning">
                {{ session('info') }}
            </div>
        @endif

        {{ $articles->links() }}

    @foreach($articles as $article)
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">
                {{ $article->title}}
            </h4>
            <small class="text-muted">
                {{ $article->created_at->diffForHumans() }}

            </small>
            <p>
                {{ $article->body }}
            </p>
            <p>
            <p>
               category: ( {{ $article->category->name }} )
            </p>
            <p>
                article_id: ( {{ $article->id }} )
             </p>
             <p>
                {{-- author: ( {{ $article->user->name }} ) --}}
             </p>
          
            </p>
            <a href="{{ url("/articles/detail/$article->id") }}">
                view Details
            </a>
        </div>
    </div>
    @endforeach

    </div>
@endsection


