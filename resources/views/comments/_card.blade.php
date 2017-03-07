@component('_.panel')
    @slot('title')
        <i class="fa fa-comment-o"></i>
        {{ $comment->user->name }}
        &mdash;
        @datetime($comment->created_at)
    @endslot
    @slot('body')
        {!! Markdown::convertToHtml($comment->body) !!}
    @endslot
@endcomponent