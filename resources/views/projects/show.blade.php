@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                @include('projects._nav-crumb', compact('project'))

                <h1 class="page-header">
                    {{ $project->name }}
                </h1>

                <div class="btn-group btn-group-sm">
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-default">
                        <i class="fa fa-pencil-square-o"></i>
                        Edit Project
                    </a>
                    <a href="{{ route('posts.create', $project) }}" class="btn btn-default">
                        <i class="fa fa-plus-circle"></i>
                        Add Post
                    </a>
                </div>

                <hr>

                @component('_.panel', ['type' => 'info'])
                    @slot('title', 'Project Description')
                    @slot('body')
                        {{ $project->description }}
                    @endslot
                @endcomponent

                <h2 class="page-header">Users</h2>

                @component('_.panel')
                    @slot('title', 'Admins')
                    @include('users._list-table', [
                        'users' => $project->admins
                    ])
                @endcomponent

                @component('_.panel')
                    @slot('title', 'Members')
                    @include('users._list-table', [
                        'users' => $project->members
                    ])
                @endcomponent

                <h2 class="page-header">
                    Danger Zone
                </h2>

                @component('_.panel', ['type' => 'danger'])
                    @slot('title', 'Danger Zone')
                    @slot('body')
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="form-inline">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <p>
                                <strong>There is no undo!</strong> The project and all of its posts will be deleted. 
                            </p>
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-times-circle"></i>
                                Delete this Project and all its Posts
                            </button>
                        </form>
                    @endslot
                @endcomponent

            </div>
        </div>
    </div>
@endsection