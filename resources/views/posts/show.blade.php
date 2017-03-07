@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                
                @include('projects._nav-crumb', compact('project'))

                <h1 class="page-header">
                    {{ $project->name }}
                </h1>

                @component('_.panel')
                    @slot('title')
                        <div class="row">
                            <div class="col-xs-6">
                                @datetime($post->created_at)
                            </div>
                            <div class="col-xs-6 text-right">
                                by {{ $post->user->name }}
                            </div>
                        </div>
                    @endslot
                    @slot('body')
                        <h2 class="page-header post-title">
                            {{ $post->title }}
                        </h2>
                        <div class="post-body">
                            {!! Markdown::convertToHtml($post->body) !!}
                        </div>
                    @endslot
                @endcomponent

                <h2 class="page-header" id="comments">
                    Comments
                </h2>

                @foreach ($post->comments as $comment)
                    @include('comments._card', compact('comment'))
                @endforeach

                @component('_.panel', ['type' => 'success'])
                    @slot('title', 'Add a Comment')
                    @slot('body')
                        <form action="{{ route('comments.store', [$project, $post]) }}" method="POST">
                            {{ csrf_field() }}
                            @include('comments._form')
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-comment"></i>
                                    Add Comment
                                </button>
                            </div>
                        </form>
                    @endslot
                @endcomponent

            </div>
        </div>
    </div>
@endsection