@foreach ($posts as $post)
    <h3>{{ $post->testt_title }}</h3>

    <div>
        {!! $post->testt_content !!}
    </div>
@endforeach