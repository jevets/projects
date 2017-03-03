<?php

namespace Tests\Unit;

use App\Project;
use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function a_post_has_a_title()
    {
        $post = factory(Post::class)->create();

        $this->assertNotNull($post->title);
    }

    /** @test */
    public function a_post_has_a_body()
    {
        $post = factory(Post::class)->create();

        $this->assertNotNull($post->body);
    }

    /** @test */
    public function a_post_belongs_to_a_project()
    {
        $project = factory(Project::class)->create();
        $post = factory(Post::class)->make();
        $project->posts()->save($post);

        $this->assertEquals($post->project->id, $project->id);
    }
}
