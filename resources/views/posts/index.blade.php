@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="page-header">
            {{ $project->name }}
        </h1>

        @include('posts._timeline', ['posts' => $project->posts])

    </div>
@endsection