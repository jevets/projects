@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <h1 class="page-header">
                    My Projects
                    <small>
                        <a href="{{ route('projects.create') }}" class="btn btn-link btn-xs">
                            <i class="fa fa-plus-circle"></i>
                            Add New
                        </a>
                    </small>
                </h1>

                <div class="list-group">
                    @foreach ($projects as $project)
                        <a href="{{ route('posts.index', $project) }}" class="list-group-item">
                            @if (auth()->user()->isProjectAdmin($project))
                                <i class="fa fa-star"></i>
                            @endif
                            {{ $project->name }}
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection