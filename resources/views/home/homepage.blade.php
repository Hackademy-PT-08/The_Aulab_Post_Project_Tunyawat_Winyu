@extends('components.layout')

@section('content')
    <div class="container">
        <div class="row">
            <h3 class="text-center py-5">
                    Latest Articles
            </h3>
            <div class="col12">
                {{-- item order selector --}}
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn btn-info">Info</button>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop3" type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop3">
                        <a class="dropdown-item" href="{{ route('article.latest') }}">Latest</a>
                        <a class="dropdown-item" href="{{ route('article.oldest') }}">Oldest</a>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($lastArticles as $lastArticle)
                <div class="col-4 py-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $lastArticle->image) }}" class="card-img-top" alt="{{ $lastArticle->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lastArticle->title }}</h5>
                            <p class="card-text">{{ $lastArticle->subtitle }}</p>
                            <hr>
                            <p class="card-text content">{{ $lastArticle->content }}</p>
                            <span class="badge bg-info my-2">Author: {{ $lastArticle->user->name }}</span>
                            <br>
                            {{-- <span class="badge bg-info my-2">Category: {{ $lastArticle->categories->name ?? 'none' }}</span> --}}
                            <br>
                            <a href="/homepage/post-details/{{ $lastArticle->id }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div> 
            @endforeach
        </div>
    </div>
@endsection