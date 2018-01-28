<?php

use App\MuscleGroup;
use Illuminate\Database\Seeder;

class MuscleGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MuscleGroup::create([
            'name' => 'Lower extremity'
        ]);

        MuscleGroup::create([
            'name' => 'Upper extremity'
        ]);

        MuscleGroup::create([
            'name' => 'Core'
        ]);
    }
}
