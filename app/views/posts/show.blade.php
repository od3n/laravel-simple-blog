<h2>{{ $post->title }}</h2>

<p>{{ $post->content }}</p>


<p>{{ count($post->comments) }} comments</p>

{{ Form::open(array('route' => array('posts.comment', $post->id))) }}
    {{ Form::hidden('post_id', $post->id) }}
    <ul>
        <li>
            {{ Form::label('author', 'Author:') }}
            {{ Form::text('author') }}
        </li>

        <li>
            {{ Form::label('content', 'Content:') }}
            {{ Form::textarea('content') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

<ul>
    @foreach ($post->comments as $comment)
        <li>{{ $comment->author }} : {{ $comment->content }}</li>
    @endforeach
</ul>