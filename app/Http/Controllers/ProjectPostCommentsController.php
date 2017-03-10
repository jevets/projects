<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use App\Project;
use Illuminate\Http\Request;

class ProjectPostCommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, Post $post, Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => $request->body,
        ]);

        return redirect()
            ->route('posts.show', [$project, $post])
            ->with('message', 'Comment added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @param  \App\Post  $post
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect()
            ->route('posts.show', [$project, $post])
            ->with('message', 'Comment deleted');
    }
}
