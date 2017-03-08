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
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $post = new Post;

        return view('posts.create', compact('project', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Project $project
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = $project->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()
            ->route('posts.show', [$project, $post])
            ->with('message', 'Post created');
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
        $post->load('user', 'comments', 'comments.user');
        
        return view('posts.show', compact('project', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Project $project
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Post $post)
    {
        return view('posts.edit', compact('project', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Project $project
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()
            ->route('posts.show', [$project, $post])
            ->with('message', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Project $project
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Post $post)
    {
        $post->delete();

        return redirect()
            ->route('posts.index', $project)
            ->with('message', 'Post deleted');
    }
}
