@extends('components.layout-revisor')

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
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 my-4">
                <h3 class="text-center">Review the Article</h3>
            </div>
        </div>
        <div class="main-container">
        <div class="col-12">
            <div class="image py-5">
                <img src="{{Storage::url($article->image)}}" alt="{{ $article->title }}" style="width: 50%">
            </div>
            <h2 class="text-center">Title: {{ $article->title }}</h2>
            <p class="text-center">Author: {{ $article->user->name }}</p>
            <p class="text-center">Category: {{ $article->category->name }}</p>
            <p class= "py-2 text-center">Created: {{ $article->created_at->diffForHumans() }}</p>
            <h4 class="text-center">Subtitle: {{ $article->subtitle }}</h4>
            <hr>
            <div class="container-fluid mb-4">
                <h4 class="card-text text-center">Content: {{ $article->content }}</h4>
            </div>
            <div class="button mb-5">
                <a href="{{ route('revisor.articleAccept', $article) }}" class="btn btn-success mx-5">Accept</a>
                <a href="{{ route('revisor.articleReject', $article) }}" class="btn btn-danger mx-5">Reject</a>
            </div>
        </div>
    </div>
    </div>



    {{-- Prova --}}
@endsection