<?php

namespace Tests\Unit;

use App\User;
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

    /** @test */
    public function a_project_is_either_open_or_closed()
    {
        $project = factory(Project::class)->create([
            'open' => true,
        ]);

        $this->assertTrue($project->isOpen());
        $this->assertFalse($project->isClosed());
    }

    /** @test */
    public function a_WhereOpen_query_scope_returns_only_open_projects()
    {
        $open = factory(Project::class, 5)->create([
            'open' => true,
        ])->each(function($project) {
            $this->assertTrue($project->isOpen());
        });
    }

    /** @test */
    public function a_WhereClosed_query_scope_returns_only_closed_projects()
    {
        $closed = factory(Project::class, 5)->create([
            'open' => false,
        ])->each(function($project) {
            $this->assertTrue($project->isClosed());
        });
    }


    /** @test */
    public function a_project_may_be_opened_via_its_open_method()
    {
        $project = factory(Project::class)->create([
            'open' => false,
        ]);

        $project->open();

        $this->assertTrue($project->isOpen());
        $this->assertTrue($project->open);
    }

    /** @test */
    public function a_project_may_be_closed_via_its_close_method()
    {
        $project = factory(Project::class)->create([
            'open' => true,
        ]);

        $project->close();

        $this->assertTrue($project->isClosed());
        $this->assertFalse($project->open);
    }
}