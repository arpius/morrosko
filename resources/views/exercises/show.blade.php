@extends('layout')

@section('title', $exercise->name)

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">{{ $exercise->name }}</p>
        </header>

        <div class="card-content">
            <div class="content">{{ $exercise->description }}</div>
        </div>

        <footer class="card-footer">
            <p class="card-footer-item">Series: {{ $exercise->series }}</p>
            <p class="card-footer-item">Replays: {{ $exercise->replays }}</p>
            <p class="card-footer-item">Muscle group:
                @if($exercise->muscleGroup)
                    {{ $exercise->muscleGroup->name }}
                @endif
            </p>
        </footer>
    </div>
    <br>
    <nav class="level">
        <div class="level-left"></div>
        <div class="level-right">
            <div class="level-item">
                <a href="{{ route('exercises.index') }}" class="button is-link">Come back</a>
            </div>
        </div>
    </nav>
@endsection