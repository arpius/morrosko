<?php

namespace Tests\Feature;

use App\Exercise;
use App\MuscleGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExercisesModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_loads_the_index()
    {
        $this->get('/')->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_loads_the_exercises_page()
    {
        $this->get('/exercises')->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_shows_the_exercises_page_without_exercises()
    {
        $this->get('/exercises')
            ->assertStatus(200)
            ->assertDontSee('Description');
    }

    /**
     * @test
     */
    public function it_shows_the_exercises_page_with_some_exercises()
    {
        MuscleGroup::create(['name' => 'Core']);
        MuscleGroup::create(['name' => 'Lower extremity']);
        MuscleGroup::create(['name' => 'Upper extremity']);

        factory(Exercise::class)->create();

        $this->get('/exercises')
            ->assertStatus(200)
            ->assertSee('Description');
    }

    /**
     * @test
     */
    public function it_displays_an_exercise_details()
    {
        MuscleGroup::create(['name' => 'Core']);
        MuscleGroup::create(['name' => 'Lower extremity']);
        MuscleGroup::create(['name' => 'Upper extremity']);

        $exercise = factory(Exercise::class)->create();

        $this->get('/exercises/' . $exercise->id)
            ->assertStatus(200)
            ->assertSee($exercise->name);
    }

    /**
     * @test
     */
    public function it_deletes_an_exercise()
    {
        MuscleGroup::create(['name' => 'Core']);
        MuscleGroup::create(['name' => 'Lower extremity']);
        MuscleGroup::create(['name' => 'Upper extremity']);

        $exercise = factory(Exercise::class)->create();

        $this->delete('/exercises/' . $exercise->id)
            ->assertRedirect('/exercises');

        $this->assertDatabaseMissing('exercises', [
            'id' => $exercise->id
        ]);
    }

    /**
     * @test
     */
    public function it_loads_the_new_exercises_page()
    {
        $this->get('/exercises/new')
            ->assertStatus(200)
            ->assertSee('Create new exercise');
    }
}
