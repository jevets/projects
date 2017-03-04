<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $user = Auth::user();

    $projects = $user->load(['projects' => function ($query) {
        return $query->whereOpen();
    }])->projects;

    return view('projects.index', compact('projects'));
})
->middleware('auth')
->name('my.projects');


Auth::routes();

Route::get('/home', 'HomeController@index');
