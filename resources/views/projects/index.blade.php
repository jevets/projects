@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <h1 class="page-header">
                    My Projects
                    <small>
                        <a href="#" class="btn btn-link btn-xs">
                            Add New
                        </a>
                    </small>
                </h1>

                <div class="list-group">
                    @foreach ($projects as $project)
                        <a href="#" class="list-group-item">
                            {{ $project->name }}
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection