<?php

namespace Tests\Browser;

use App\Project;
use Tests\DuskTestCase;
use Tests\Browser\Pages\HomePage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProjectsIndexPageTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_displays_the_users_open_projects()
    {
        $projects = factory(Project::class, 5)->create([
            'open' => true
        ]);

        $this->browse(function ($browser) use ($projects) {
            $browser->visit(new HomePage);
            
            $projects->each(function ($project) use ($browser) {
                $browser->assertSee($project->name);
            });
        });
    }
}
