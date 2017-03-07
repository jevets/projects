@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <h1 class="page-header">
                    {{ $project->name }}
                </h1>

                <p class="actions">
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">
                        <i class="fa fa-pencil-square-o"></i>
                        Edit Project
                    </a>
                    <a href="{{ route('posts.create', $project) }}" class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i>
                        Add Post
                    </a>
                </p>

                <hr>

                @component('_.panel')
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

            </div>
        </div>
    </div>
@endsection