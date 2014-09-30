<h2>{{ $title }}</h2>

<a href="{{ URL::to('posts/create') }}"> Create new Post</a>
<br />
<br />

<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
            <td>
                <a href="{{ URL::to('posts/' . $post->id . '/edit') }}"> Edit </a> |
                <a href="{{ URL::to('posts/'. $post->id . '/delete') }}"> Delete </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>