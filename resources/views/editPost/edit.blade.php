@extends('components.layout')

@section('content')
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
    </style>

    {{-- Error Message --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="col-12">
            <form action="/profile/edit-post/{{ $article->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <h3 class="text-center py-4">Edit Post</h3>
                </div>
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $article->title }}">
                </div>
                <div class="mb-3">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{ $article->subtitle }}">
                </div>
                <div class="mb-3">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" rows="3">{{ $article->content }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image">
                </div>
                <div class="mb-3">
                    <label for="categories">Categories</label>
                    <select class="form-select" name="categories[]" id="categories">
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}"  {{ ($article->categories->contains($categorie->id)) ? 'selected' : '' }}>{{ $categorie->name }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="mb-3">
                    <div class="btn">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection