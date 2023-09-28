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

    <div class="container mb-5">
        <div class="col-12">
            <form action="{{ route('addPost.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <h3 class="text-center py-4">Add Post</h3>
                </div>
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Write here title of your article" value="{{ old('title') }}">

                    <span style="color: red;">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Write here sub title of your article" value="{{ old('subtitle') }}">

                    <span style="color: red;">
                        @error('subtitle')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" rows="3" placeholder="Write here content of your article">{{ old('content') }}</textarea>
                    <span style="color: red;">
                        @error('content')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image">
                </div>
                <div class="mb-3">
                    <label for="categories">Category</label>
                    <select class="form-select" name="category_id" id="categories">
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        @endforeach
                      </select>
                      <span style="color: red;">
                        @error('categories')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="tags">Tag</label>
                    <select class="form-select" name="tags[]" id="tags" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                      </select>
                      <span style="color: red;">
                        @error('tags')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <div class="btn">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection