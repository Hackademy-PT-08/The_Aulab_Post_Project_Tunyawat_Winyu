@extends('components.layout')


@section('content')

    @include('sweetalert::alert')
    <style>
        .container{
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.36);
            margin-top: 10%;
            padding: 30px 40px 30px 40px;
            border-radius: 10px;
        }
        
        .card{
            margin-left: 15%;
        }

        img{
            max-width: 300px;
            max-height: 200px;
        }
    </style>
    
<div class="container">
    <div class="col-12">
       <div class="form-group">
        <div class="mb-3">
            <h3 class="text-center">
                Profile
            </h3>
        </div>
        {{-- Current username --}}
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control-plaintext" value="{{ auth()->user()->name }}">
        </div>
        {{-- Current userEmail --}}
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control-plaintext" value="{{ auth()->user()->email }}">
        </div>
        <div class="mb-3">
            <div class="edit-info">
                <a class="btn btn-primary" href="{{ route('edit.info') }}">Edit Profile Information</a>
            </div>
        </div>
       </div>
    </div>
</div>
@if (auth()->user()->is_writer)
<h3 class="text-center py-5">All publiched</h3>
<div class="container-fluid py-5">
    <div class="row">
        @foreach ($user_article as $user_article)
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ Storage::url($user_article->image) }}" class="card-img-top" alt="{{ $user_article->title }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $user_article->title }}</h5>
                      <p class="card-text">{{ $user_article->subtitle }}</p>
                      <hr>
                      <p class="card-text content">{{ $user_article->content }}</p>
                      <hr>
                      <p>Author: <a href="#" class="btn btn-outline-dark btn-sm my-1">{{ $user_article->user->name }}</a></p>
                      <p>Category: <a href="/homepage/article-category/{{ $user_article->category->id }}" class="btn btn-outline-dark btn-sm my-1">{{ $user_article->category->name }}</a></p>
                      @if (auth()->check())
                          @if (auth()->user()->id == $user_article->user_id)
                            <a class="btn btn-primary my-2" href="/profile/edit-post/{{ $user_article->id }}">Edit</a>
                            <form action="/profile/delete-post/{{ $user_article->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                          @endif
                      @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
@endsection