@extends('components.layout')

@section('content')

    <style>
        .image{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <div class="main-container">
        <div class="col-12">
            <div class="image py-5">
                <img src="{{ asset('storage/' . $lastArticles->image) }}" alt="{{ $lastArticles->title }}" style="width: 50%">
            </div>
            <h2 class="text-center">{{ $lastArticles->title }}</h2>
            <p class="text-center py-4"><i>Author: {{ $lastArticles->user->name }}</i></p>
            <h4 class="text-center">{{ $lastArticles->subtitle }}</h4>
            <hr>
            <div class="container-fluid mb-4">
                <p class="card-text text-center">{{ $lastArticles->content }}</p>
            </div>
            <div class="btn">
                <a href="{{ route('homepage') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection