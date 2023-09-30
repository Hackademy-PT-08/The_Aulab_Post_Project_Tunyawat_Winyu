<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Article</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ count($category->articles) }}</td>
                <td>
                    <form action="{{ route('admin.category.edit', $category) }}" method="post">
                        @csrf
                        <input type="text" name="name" class="form-control" placeholder="Modify name category">
                        <button type="submit" class="btn btn-warning my-3">Save</button>
                    </form>    
                </td>
                <td>
                    <form action="{{ route('admin.category.delete', $category) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark">Delete</button>
                    </form>    
                </td>
            </tr>

        @endforeach
    </tbody>
</table>