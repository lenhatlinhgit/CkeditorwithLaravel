<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
</head>
<body>

<h2>All Posts</h2>

@foreach ($posts as $post)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:20px;">
        <h3>{{ $post->title }}</h3>
        <div>
            {!! $post->content !!}
        </div>
        <small>Created at: {{ $post->created_at }}</small>
    </div>
@endforeach

<a href="/post-create">Create New Post</a>

</body>
</html>