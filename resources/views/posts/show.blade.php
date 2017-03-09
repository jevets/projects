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
                                @datetime($post->published_at)
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
                    @slot('footer')
                        <form action="{{ route('posts.destroy', [$project, $post]) }}" class="form-inline" method="POST">
                            <a href="{{ route('posts.edit', [$project, $post]) }}" class="btn btn-link btn-sm">
                                <i class="fa fa-pencil-square-o"></i>
                                Edit Post
                            </a>
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-link btn-sm">
                                <span class="text-danger">
                                    <i class="fa fa-times-circle"></i>
                                    Delete Post
                                </span>
                            </button>
                        </form>
                    @endslot
                @endcomponent

                <h2 class="page-header" id="comments">
                    Comments
                </h2>

                @foreach ($post->comments as $comment)
                    @include('comments._card', compact('comment'))
                @endforeach

                @include('comments._add-new', compact('project', 'post'))

            </div>
        </div>
    </div>
@endsection