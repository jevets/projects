@component('_.panel')
    @slot('title', 'Add a Comment')
    @slot('body')
        <form action="{{ route('comments.store', [$project, $post]) }}" method="POST">
            {{ csrf_field() }}
            @include('comments._form')
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">
                    <i class="fa fa-comment"></i>
                    Add Comment
                </button>
            </div>
        </form>
    @endslot
@endcomponent