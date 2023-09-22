@extends('components.layout')


@section('content')
    <div class="container-fluid">
        <div class="col-12">
            <div class="row">
                <h3 class="py-5"> 
                    Result: {{ $categoryName }}
                </h3>
            </div>
        </div>
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-4 py-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->subtitle }}</p>
                        <hr>
                        <p class="card-text content">{{ $article->content }}</p>
                        <span class="badge bg-info my-2">Author: {{ $article->user->name }}</span>
                        <br>
                        <span class="badge bg-info my-2">Category: {{ $categoryName }}</span>
                        <br>
                        <a href="/homepage/post-details/{{ $article->id }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
@endsection