<?php

namespace Tests\Browser;

use App\User;
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
        $user = factory(User::class)->create();

        $open   = factory(Project::class, 2)->create([
            'user_id' => $user->id,
            'open' => true,
        ]);
        $closed = factory(Project::class, 2)->create([
            'user_id' => $user->id,
            'open' => false,
        ]);

        $this->browse(function ($browser) use ($user, $open, $closed) {
            $browser
                ->loginAs($user)
                ->visit(new HomePage);

            $open->each(function ($project) use ($browser) {
                $browser->assertSee($project->name);
            });

            $closed->each(function ($project) use ($browser) {
                $browser->assertDontSee($project->name);
            });
        });
    }
}
