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

                @component('_.panel')
                    @slot('body')
                        <form action="{{ route('projects.store') }}" method="POST">
                            {{ csrf_field() }}
                            @include('projects._form', compact('project'))
                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus-circle"></i>
                                    Create Project
                                </button>
                            </div>
                        </form>
                    @endslot
                @endcomponent

            </div>
        </div>
    </div>
@endsection