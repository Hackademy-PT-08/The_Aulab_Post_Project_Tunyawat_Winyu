@extends('components.layout')

@section('content')
    <div class="container">
        <div class="row">
            <h3 class="text-center py-5">
                    Latest Articles
            </h3>
            @foreach ($lastArticles as $lastArticle)
                <div class="col-4 py-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $lastArticle->image) }}" class="card-img-top" alt="{{ $lastArticle->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lastArticle->title }}</h5>
                            <p class="card-text author py-1"><i>Author: {{ $lastArticle->user->name }}</i></p>
                            <p class="card-text">{{ $lastArticle->subtitle }}</p>
                            <hr>
                            <p class="card-text content">{{ $lastArticle->content }}</p>
                            <a href="/homepage/post-details/{{ $lastArticle->id }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div> 
            @endforeach
        </div>
    </div>
@endsection