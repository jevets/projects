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
    @can('delete', $comment)
        @slot('footer')
            <form class="form-inline" method="POST" action="{{ route('comments.destroy', [$project, $post, $comment]) }}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-link btn-xs">
                    <span class="text-danger">
                        <i class="fa fa-times-circle"></i>
                        Delete Comment
                    </span>
                </button>
            </form>
        @endslot
    @endcan
@endcomponent