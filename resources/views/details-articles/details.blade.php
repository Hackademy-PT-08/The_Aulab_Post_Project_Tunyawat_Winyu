@extends('components.layout')

@section('content')

    <style>
        .image{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        img{
            max-width: 30%;
            max-height: 30%;
        }
        
    </style>
    <div class="main-container">
        <div class="col-12">
            <div class="image py-5">
                <img src="{{Storage::url($article_detail->image)}}" alt="{{ $article_detail->title }}" style="width: 50%">
            </div>
            <h2 class="text-center">{{ $article_detail->title }}</h2>
            <p class="text-center">Author: <a href="#" class="btn btn-outline-dark btn-sm my-1">{{ $article_detail->user->name }}</a></p>
            <p class="text-center">Category: <a href="/homepage/article-category/{{ $article_detail->category->id }}" class="btn btn-outline-dark btn-sm my-1">{{ $article_detail->category->name }}</a></p>
           @foreach ($article_details->tags as $tag)
           <span class="badge bg-warning">#{{ $tag->name }}</span>
           @endforeach
            <p class= "py-2 text-center">Published on: {{ $article_detail->created_at->format('d/m/Y') }}</p>
            <h4 class="text-center">{{ $article_detail->subtitle }}</h4>
            <hr>
            <div class="container-fluid mb-4">
                <p class="card-text text-center">{{ $article_detail->content }}</p>
            </div>
            <hr>
            @if (auth()->user()->is_admin)
                <div class="button mb-5">
                    <a href="{{ route('admin.all-article') }}" class="btn btn-primary">Back</a>
                </div>
            @else
                <div class="button mb-5">
                    <a href="{{ route('homepage') }}" class="btn btn-primary">Back</a>
                </div>
            @endif
        </div>
    </div>
@endsection