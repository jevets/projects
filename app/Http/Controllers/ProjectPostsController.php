<?php

namespace App\Http\Controllers;

use App\Post;
use App\Project;
use Illuminate\Http\Request;

class ProjectPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $project->load(['posts', 'posts.user', 'posts.comments']);

        return view('posts.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Post $post)
    {
        $post->load('comments');
        
        return view('posts.show', compact('project', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
