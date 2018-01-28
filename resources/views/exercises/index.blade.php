@extends('layout')

@section('title', $title)

@section('content')
    <nav class="level">
        <div class="level-left"></div>
        <div class="level-right">
            <div class="level-item">
                <a href="{{ route('exercises.create') }}" class="button is-link">New exercise</a>
            </div>
        </div>
    </nav>

    @if($exercises->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Muscle group</th>
                    <th>Series</th>
                    <th>Replays</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($exercises as $exercise)
                <tr>
                    <td>{{ $exercise->name }}</td>
                    <td>{{ $exercise->description }}</td>
                    <td>
                        @if($exercise->muscleGroup)
                            {{ $exercise->muscleGroup->name }}
                        @endif
                    </td>
                    <td>{{ $exercise->series }}</td>
                    <td>{{ $exercise->replays }}</td>
                    <td>
                        <a href="{{ route('exercises.show', $exercise) }}"
                           class="button is-link is-outlined is-small">
                            <span class="oi" data-glyph="eye"></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('exercises.edit', $exercise) }}"
                           class="button is-link is-outlined is-small">
                            <span class="oi" data-glyph="pencil"></span>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('exercises.destroy', $exercise) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <button type="submit" class="button is-danger is-outlined is-small">
                                <span class="oi" data-glyph="trash"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $exercises->links() }}
    @else
        <p>¡Circulen! aquí no hay nada que ver</p>
    @endif
@endsection