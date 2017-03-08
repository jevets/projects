@component('_.panel')
    @slot('title')
        <div class="row">
            <div class="col-sm-6">
                <i class="fa fa-comment-o"></i>
                {{ $comment->user->name }}        
            </div>
            <div class="col-sm-6 text-right">
                @datetime($comment->created_at)
            </div>
        </div>
    @endslot
    @slot('body')
        {!! Markdown::convertToHtml($comment->body) !!}
    @endslot
@endcomponent