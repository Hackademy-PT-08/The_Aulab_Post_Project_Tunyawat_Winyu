<div>
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
                        <hr>
                        <p>Published from: <a href="#" class="btn btn-outline-dark btn-sm my-1">{{ $article->user->name }}</a></p>
                        <p>Category: <a href="/homepage/article-category/{{ $article->category->id }}" class="btn btn-outline-dark btn-sm my-1">{{ $article->category->name }}</a></p>
                        <span class="badge bg-warning py-2">Published on: {{ $article->created_at->format('d/m/Y') }}</span>
                        <a href="/homepage/post-details/{{ $article->id }}" class="btn btn-dark">Detail</a>
                    </div>
                </div>
            </div> 
        @endforeach
    </div>
</div>
