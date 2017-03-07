<div class="alert alert-{{ $type or 'info' }}">
    @if ($strong ?? false)
        <strong>{{ $strong }}</strong>
    @endif

    {{ $slot }}
</div>