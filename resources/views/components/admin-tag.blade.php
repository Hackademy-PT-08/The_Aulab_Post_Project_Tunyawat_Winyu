<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tag</th>
            <th scope="col">Article</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tags as $tag)
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td>{{ $tag->name }}</td>
                <td>{{ count($tag->articles) }}</td>
                <td>
                    <form action="{{ route('admin.tag.edit', $tag) }}" method="post">
                        @csrf
                        <input type="text" name="name" class="form-control" placeholder="Modify name tag">
                        <button type="submit" class="btn btn-warning my-3">Save</button>
                    </form>    
                </td>
                <td>
                    <form action="{{ route('admin.tag.delete', $tag) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark">Delete</button>
                    </form>    
                </td>
            </tr>

        @endforeach
    </tbody>
</table>