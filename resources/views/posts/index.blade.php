@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <h1 class="page-header">
                    {{ $project->name }}
                    <small>
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-link btn-xs">
                            <i class="fa fa-info-circle"></i>
                            project details
                        </a>
                    </small>
                </h1>

                @if (! $project->posts->isEmpty())
                    @include('posts._timeline', ['posts' => $project->posts])
                @else
                    @component('_.alert')
                        No posts to show
                    @endcomponent
                    @include('projects._description', compact('project'))
                @endif

            </div>
        </div>
    </div>
@endsection