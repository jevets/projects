@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <h1 class="page-header">
                    {{ $project->name }}
                </h1>

                @component('_.panel')
                    @slot('title', 'Add a Post')
                    @slot('body')
                        <form action="{{ route('posts.store', $project) }}" method="POST">
                            {{ csrf_field() }}
                            @include('posts._form', compact('project', 'post'))
                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus-circle"></i>
                                    Add Post
                                </button>
                            </div>
                        </form>
                    @endslot
                @endcomponent

            </div>
        </div>
    </div>
@endsection