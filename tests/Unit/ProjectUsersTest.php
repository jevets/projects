<?php

namespace Tests\Unit;

use App\User;
use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectUsersTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function a_project_has_many_members()
    {
        $project = factory(Project::class)->create();

        $users = factory(User::class, 4)->create();

        $users->each(function ($user) use ($project) {
            $project->addMember($user);
        });

        $users->each(function ($user) use ($project) {
            $this->assertTrue(
                $project->members->contains($user)
            );
        });
    }
}
