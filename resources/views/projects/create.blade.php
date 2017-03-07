@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <h1 class="page-header">
                    Add New Project
                </h1>

                @if (! $errors->isEmpty())
                    <div class="alert alert-danger">
                        <strong>Uh-oh!</strong> You have errors.
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('projects.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label class="control-label" for="name">Project Name</label>
                                <input type="text" class="form-control" placeholder="Name the project" name="name" id="name">
                                @if ($errors->has('name'))
                                    <div class="help-block">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Describe the project"></textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus-circle"></i>
                                    Create Project
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection