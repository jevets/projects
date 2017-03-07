<a href="{{ route('posts.show', [$project, $post]) }}" class="list-group-item">
    <div class="post-timestamp">
        @datetime($post->created_at)
    </div>
    <h2 class="post-title h4 text-primary">
        {{ $post->title }}
    </h2>
    @if ($post->teaser)
        <div class="post-teaser">{{ $post->teaser }}</div>
    @endif
</a>