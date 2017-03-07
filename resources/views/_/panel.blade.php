<div class="panel panel-{{ $type or 'default' }}">
    @if ($before ?? false)
        {{ $before }}
    @endif

    @if (($heading ?? false) || ($title ?? false))
        <div class="panel-heading">
            @if ($heading ?? false)
                {{ $heading }}
            @endif

            @if ($title ?? false)
                <strong class="panel-title">
                    {{ $title }}
                </strong>
            @endif
        </div>
    @endif

    {{ $slot }}

    @if ($body ?? false)
        <div class="panel-body">
            {{ $body }}
        </div>
    @endif

    @if ($footer ?? false)
        <div class="panel-footer">
            {{ $footer }}
        </div>
    @endif

    @if ($after ?? false)
        {{ $after }}
    @endif
</div>