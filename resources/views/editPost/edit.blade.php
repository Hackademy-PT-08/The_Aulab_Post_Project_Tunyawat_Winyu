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

    <div class="container mb-5">
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
                {{-- <div class="mb-3">
                    <label for="categories" class="form-label">Catogory</label>
                    <select class="form-select" id="categories" name="categories[]" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ ($painting->categories->contains($category->id)) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                {{-- <div class="mb-3">
                    <label for="tags">Tag</label>
                    <select class="form-select" name="tags[]" id="tags" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }} {{ ($article->tags->contains($tag)) ? 'selected' : '' }}">{{ $tag->name }}</option>
                        @endforeach
                      </select>
                </div> --}}
                <div class="mb-3">
                    <div class="btn">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection