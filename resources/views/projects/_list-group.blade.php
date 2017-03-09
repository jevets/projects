<div class="list-group">
    @foreach ($projects as $project)
        <a href="{{ route('posts.index', $project) }}" class="list-group-item">
            {{ $project->name }}
        </a>
    @endforeach
</div>