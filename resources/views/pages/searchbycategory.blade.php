@extends('layout.app') {{-- Assuming you have a master layout file --}}

@section('content')
    <div class="container">
        <h1>Articles in Category: {{ $category->name }}</h1>

        @if ($articles->isEmpty())
            <p>No articles found in this category.</p>
        @else
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                                <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination links --}}
            {{ $articles->links() }}
        @endif
    </div>
@endsection
