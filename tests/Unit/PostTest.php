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
}
