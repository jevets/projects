<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', 'ProjectsController@index')
        ->name('projects.index');
    Route::get('{project}/details', 'ProjectsController@show')
        ->name('projects.show');
    Route::get('projects/create', 'ProjectsController@create')
        ->name('projects.create');
    Route::post('projects', 'ProjectsController@store')
        ->name('projects.store');
    Route::get('projects/{project}/edit', 'ProjectsController@edit')
        ->name('projects.edit');
    Route::patch('projects/{project}', 'ProjectsController@update')
        ->name('projects.update');
    Route::delete('projects/{project}', 'ProjectsController@destroy')
        ->name('projects.destroy');

    Route::get('{project}', 'ProjectPostsController@index')
        ->name('posts.index');
    Route::get('{project}/posts/create', 'ProjectPostsController@create')
        ->name('posts.create');
    Route::get('{project}/{post}', 'ProjectPostsController@show')
        ->name('posts.show');

    Route::post('{project}/posts/{post}/comments', 'ProjectPostCommentsController@store')
        ->name('comments.store');

});