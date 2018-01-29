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
    public function it_loads_the_exercises_page()
    {
        $this->get(route('exercises.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_shows_the_exercises_page_empty()
    {
        $this->get(route('exercises.index'))
            ->assertStatus(200)
            ->assertDontSee('Description');
    }

    /**
     * @test
     */
    public function it_shows_the_exercises_page_with_some_exercises()
    {
        $muscleGroup = MuscleGroup::create(['name' => 'Core']);

        factory(Exercise::class)->create([
            'muscle_group_id' => $muscleGroup->id
        ]);

        $this->get(route('exercises.index'))
            ->assertStatus(200)
            ->assertSee('Description');
    }

    /**
     * @test
     */
    public function it_displays_an_exercise_details()
    {
        $muscleGroup = MuscleGroup::create(['name' => 'Upper extremity']);

        $exercise = factory(Exercise::class)->create([
            'muscle_group_id' => $muscleGroup->id
        ]);

        $this->get('/exercises/' . $exercise->id)
            ->assertStatus(200)
            ->assertSee($exercise->name);
    }

    /**
     * @test
     */
    public function it_deletes_an_exercise()
    {
        $muscleGroup = MuscleGroup::create(['name' => 'Lower extremity']);

        $exercise = factory(Exercise::class)->create([
            'muscle_group_id' => $muscleGroup->id
        ]);

        $this->delete('/exercises/' . $exercise->id)
            ->assertRedirect('exercises');

        $this->assertDatabaseMissing('exercises', [
            'id' => $exercise->id
        ]);
    }

    /**
     * @test
     */
    public function it_loads_the_new_exercises_page()
    {
        $this->get(route('exercises.create'))
            ->assertSee('Creating exercise');
    }
}
