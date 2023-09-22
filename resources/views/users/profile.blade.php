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
<h3 class="text-center py-5">All publiched</h3>
<div class="container-fluid py-5">
    <div class="row">
        @foreach ($articles as $article)
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $article->title }}</h5>
                      <p class="card-text">{{ $article->subtitle }}</p>
                      <hr>
                      <p class="card-text content">{{ $article->content }}</p>
                      <span class="badge bg-info my-2">Author: {{ $article->user->name }}</span>
                      <br>
                      {{-- <span class="badge bg-info my-2">Category: {{ $article->categories->name ?? 'none'}}</span> --}}
                      <br>
                      @if (auth()->check())
                          @if (auth()->user()->id == $article->user_id)
                            <a class="btn btn-primary my-2" href="/profile/edit-post/{{ $article->id }}">Edit</a>
                            <form action="/profile/delete-post/{{ $article->id }}" method="post">
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
@endsection