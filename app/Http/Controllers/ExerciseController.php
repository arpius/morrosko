<?php

namespace App\Http\Controllers;

use App\Exercise;

class ExerciseController extends Controller
{
    public function index()
    {
        $title = trans('views.exercise_list');
        $exercises = Exercise::simplePaginate(6);

        return view('exercises.index', compact('title', 'exercises'));
    }

    public function create()
    {
        return view('exercises.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|string',
            'description' => 'string',
            'muscle-group' => 'digits_between:1,3',
            'series' => 'digits_between:1,5',
            'replays' => 'digits_between:1,15',
        ]);

        Exercise::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'muscle_group_id' => $data['muscle-group'],
            'series' => $data['series'],
            'replays' => $data['replays'],
        ]);

        return redirect()->route('exercises.index');
    }

    public function show(Exercise $exercise)
    {
        return view('exercises.show', compact('exercise'));
    }

    public function edit(Exercise $exercise)
    {
        return view('exercises.edit', compact('exercise'));
    }

    public function update(Exercise $exercise)
    {
        $data = request()->validate([
            'name' => 'required|string',
            'description' => 'string',
            'muscle-group' => 'digits_between:1,3',
            'series' => 'digits_between:1,5',
            'replays' => 'digits_between:1,15',
        ]);

        $exercise->update($data);

        return redirect()->route('exercises.show', ['exercise' => $exercise]);
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return redirect()->route('exercises.index');
    }
}
