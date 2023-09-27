@extends('components.layout')

@section('content')
    <style>
        .card{
            margin-left: 15%;
        }

        img{
            max-width: 300px;
            max-height: 300px;
        }
    </style>
    <div class="container">
        <div class="row">
        <h3 class="text-center py-5">
                Latest Articles
        </h3>
        <div class="col-12">
            {{-- item order selector --}}
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-dark my-5">Info</button>
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop3" type="button" class="btn btn-dark dropdown-toggle my-5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop3">
                    <a class="dropdown-item" href="{{ route('article.latest') }}">Latest</a>
                    <a class="dropdown-item" href="{{ route('article.oldest') }}">Oldest</a>
                    </div>
                </div>
            </div>
            @livewire('article-search')
            {{-- <div class="row">
                @foreach ($lastArticles as $lastArticle)
                    <div class="col-4 py-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{Storage::url($lastArticle->image)}}" class="card-img-top" alt="{{ $lastArticle->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $lastArticle->title }}</h5>
                                <p class="card-text">{{ $lastArticle->subtitle }}</p>
                                <hr>
                                <p class="card-text content">{{ $lastArticle->content }}</p>
                                <hr>
                                <p>Published from: <a href="#" class="btn btn-outline-dark btn-sm my-1">{{ $lastArticle->user->name }}</a></p>
                                <p>Category: <a href="/homepage/article-category/{{ $lastArticle->category->id }}" class="btn btn-outline-dark btn-sm my-1">{{ $lastArticle->category->name }}</a></p>
                                <span class="badge bg-warning py-2">Published on: {{ $lastArticle->created_at->format('d/m/Y') }}</span>
                                <a href="/homepage/post-details/{{ $lastArticle->id }}" class="btn btn-dark">Detail</a>
                            </div>
                        </div>
                    </div> 
                @endforeach
            </div> --}}
        </div>
    </div>
@endsection