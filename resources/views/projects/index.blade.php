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

                @include('projects._list-group', compact('projects'))

            </div>
        </div>
    </div>
@endsection