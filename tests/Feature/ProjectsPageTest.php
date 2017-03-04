<?php

namespace Tests\Feature;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectsPageTest extends TestCase
{
    use DatabaseMigrations;

    protected function getPage($uri = '/')
    {
        return $this->get($uri);
    }

    /** @test */
    public function it_loads_the_projects_page()
    {
        $response = $this->getPage();

        $response->assertStatus(200);
    }
}
