@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <h1 class="page-header">
                    Edit Post 
                </h1>

                @component('_.panel')
                    @slot('body')
                        <form action="{{ route('posts.update', [$project, $post]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            @include('posts._form', compact('project', 'post'))
                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-check-circle"></i>
                                    Update Post
                                </button>
                                <a href="{{ route('posts.show', [$project, $post]) }}" class="btn btn-link btn-sm">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    @endslot
                @endcomponent

            </div>
        </div>
    </div>
@endsection