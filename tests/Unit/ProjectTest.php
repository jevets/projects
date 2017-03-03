<?php

namespace Tests\Unit;

use App\Post;
use App\Project;
use Tests\TestCase;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_project_has_a_name()
    {
        $name = 'Project X';

        $project = factory(Project::class)->create([
            'name' => $name,
        ]);

        $this->assertEquals($project->name, $name);
    }

    /** @test */
    public function a_project_has_a_slug()
    {
        $project = factory(Project::class)->create();

        $this->assertNotNull($project->slug);
    }

    /** @test */
    public function a_project_description_is_optional()
    {
        $project = factory(Project::class)->create([
            'description' => null,
        ]);

        $this->assertNull($project->description);
    }

    /** @test */
    public function project_slugs_must_be_unique()
    {
        $this->expectException(QueryException::class);

        $slug = 'project-a';

        $project1 = factory(Project::class)->create([
            'slug' => $slug,
        ]);

        $project2 = factory(Project::class)->create([
            'slug' => $slug,
        ]);
    }

    /** @test */
    public function a_project_has_many_posts()
    {
        $project = factory(Project::class)->create();

        $post = factory(Post::class)->create([
            'project_id' => $project->id,
        ]);

        $this->assertEquals($project->id, $post->project->id);
    }
}
