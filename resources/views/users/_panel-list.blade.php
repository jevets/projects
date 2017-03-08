@component('_.panel')
    @if ($title ?? false)
        @slot('title', $title)
    @endif
    @include('users._list-table', [
        'users' => $users,
    ])
@endcomponent