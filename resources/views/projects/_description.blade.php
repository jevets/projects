@if ($project->description)
    @component('_.panel')
        @slot('title', 'Project Description')
        @slot('body')
            {{ $project->description }}
        @endslot
    @endcomponent
@endif