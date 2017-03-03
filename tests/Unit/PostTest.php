<?php

namespace Tests\Unit;

use App\Post;
use App\User;
use App\Project;
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
    public function a_post_has_an_optional_teaser()
    {
        $post1 = factory(Post::class)->create([
            'teaser' => null,
        ]);
        $post2 = factory(Post::class)->create([
            'teaser' => 'I am not null',
        ]);

        $this->assertNull($post1->teaser);
        $this->assertNotNull($post2->teaser);
    }

    /** @test */
    public function a_post_belongs_to_a_project()
    {
        $project = factory(Project::class)->create();

        $post = $project->posts()->save(
            factory(Post::class)->make()
        );

        $this->assertEquals(
            $post->project->id, $project->id
        );
    }

    /** @test */
    public function a_post_belongs_to_a_user()
    {
        $user = factory(User::class)->create();

        $post = $user->posts()->save(
            factory(Post::class)->make()
        );

        $this->assertEquals(
            $user->id, $post->user->id
        );
    }
}
