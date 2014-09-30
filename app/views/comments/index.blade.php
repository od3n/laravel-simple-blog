<h2>{{ $title }}</h2>

<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Post</th>
            <th>Comment</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
        <tr>
            <td>{{ $comment->id }}</td>
            <td>{{ $comment->post->title }}</td>
            <td>{{ $comment->content }}</td>
            <td>{{ $comment->created_at }}</td>
            <td>{{ $comment->updated_at }}</td>
            <td>
                <a href="{{ URL::to('posts/' . $comment->post_id) }}"> Post </a> |
                <a href="{{ URL::to('comments/' . $comment->id) }}"> Show </a> |
                <a href="{{ URL::to('comments/' . $comment->id . '/edit') }}"> Edit </a> |
                <a href="{{ URL::to('comments/'. $comment->id . '/delete') }}"> Delete </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>