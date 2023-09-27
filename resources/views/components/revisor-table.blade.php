<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Writed by</th>
            <th scope="col">Published by</th>
            <th scope="col">Read</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->category->name }}</td>
                <td>{{ $article->user->name }}</td>
                <td>{{ $article->created_at->format('Y/m/d') }}</td>
                <td>
                    <a href="{{ route('revisor.articleDetail', $article) }}" class ="btn btn-warning">Read</a>
                </td>
            </tr>

        @endforeach
    </tbody>
</table>