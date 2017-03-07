@if ($project->description)
    @component('_.panel', ['type' => 'info'])
        @slot('title', 'Project Description')
        @slot('body')
            {{ $project->description }}
        @endslot
    @endcomponent
@endif