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
    <div class="container-fluid">
        <div class="col-12">
            <div class="row">
                <div class="col-12 my-5">
                    <h3 class="text-center">Article for: {{ $key }}</h3>
                </div>
                @foreach ($articles as $articles)
                    <div class="col-4 py-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{Storage::url($articles->image)}}" class="card-img-top" alt="{{ $articles->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $articles->title }}</h5>
                                <p class="card-text">{{ $articles->subtitle }}</p>
                                <hr>
                                <p class="card-text content">{{ $articles->content }}</p>
                                <hr>
                                <p>Published from: <a href="#" class="btn btn-outline-dark btn-sm my-1">{{ $articles->user->name }}</a></p>
                                <p>Category: <a href="/homepage/article-category/{{ $articles->category->id }}" class="btn btn-outline-dark btn-sm my-1">{{ $articles->category->name }}</a></p>
                                <span class="badge bg-warning py-2">Published on: {{ $articles->created_at->format('d/m/Y') }}</span>
                                <a href="/homepage/post-details/{{ $articles->id }}" class="btn btn-dark">Detail</a>
                            </div>
                        </div>
                    </div> 
                @endforeach
            </div>
        </div>
    </div>
@endsection