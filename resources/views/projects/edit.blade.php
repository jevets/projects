@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                @include('projects._nav-crumb', compact('project'))

                <h1 class="page-header">
                    Editing 
                    <small>
                        {{ $project->name }}
                    </small>
                </h1>

                @component('_.panel')
                    @slot('body')
                        <form action="{{ route('projects.update', $project) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            @include('projects._form', compact('project'))
                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i>
                                    Save Project
                                </button>
                            </div>
                        </form>
                    @endslot
                @endcomponent

            </div>
        </div>
    </div>
@endsection