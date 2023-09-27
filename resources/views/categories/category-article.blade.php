@extends('components.layout')


@section('content')
    <div class="container-fluid">
        <div class="col-12">
            <div class="row">
                <h3 class="py-5 text-center"> 
                    Result: {{ $category->name }}
                </h3>
            </div>
        </div>
        @if (!$articles->isEmpty())
            <div class="row">
                @foreach ($articles as $article)
                <div class="col-4 py-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="{{ $article->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->subtitle }}</p>
                            <hr>
                            <p class="card-text content">{{ $article->content }}</p>
                            <span class="btn btn-outline-dark btn-sm my-1">Author: {{ $article->user->name }}</span>
                            <br>
                            <a href="/homepage/article-category/{{ $category->id }}" class="btn btn-outline-dark btn-sm my-1">Category: {{ $article->category->name }}</a>
                            <br>
                            <a href="/homepage/post-details/{{ $article->id }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>
        @else
            <h5 class="text-center">"Sorry, there are no articles in this category"</h5>
        @endif
    </div>
@endsection