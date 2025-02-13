<div>
    <h1>Publicaciones del Blog</h1>
    <ul>
        @foreach($posts as $post)
            <li>
                <strong>{{ $post->title }}</strong><br>
                {{ $post->description }}<br>
                <small>Publicado el: {{ $post->published_at }}</small>
            </li>
        @endforeach
    </ul>
</div>