<ol class="timeline">
    @foreach ($project->posts as $post)
        <li class="post">
            <div class="post-timestamp">
                @datetime($post->created_at)
                by 
                {{ $post->user->name }}
            </div>
            <div class="post-title">
                <a href="{{ route('posts.show', [$project, $post]) }}">
                    {{ $post->title }}
                </a>
            </div>
            @if ($post->teaser)
                <p class="post-teaser">
                    {{ $post->teaser }}
                </p>
            @endif
        </li>
    @endforeach
</ol>