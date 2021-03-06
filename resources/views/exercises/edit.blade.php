@extends('layout')

@section('title', trans('views.editing_exercise') . " [{$exercise->id}]")

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">@lang('views.editing_exercise') ({{ $exercise->name }})</p>
        </header>

        <div class="card-content">
            <div class="content">
                @if($errors->any())
                    <article class="message is-danger">
                        <div class="message-body">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @endif

                <form method="POST" action="{{ url("exercises/{$exercise->id}") }}">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="field">
                        <label for="name" class="label">@lang('views.name')</label>
                        <div class="control">
                            <input type="text" class="input" name="name" value="{{ old('name', $exercise->name) }}">
                        </div>
                    </div>

                    <div class="field">
                        <label for="description" class="label">@lang('views.description')</label>
                        <div class="control">
                            <input type="text" class="input" name="description"
                                   value="{{ old('description', $exercise->description) }}">
                        </div>
                    </div>

                    <div class="field">
                        <label for="muscle-group" class="label">@lang('views.muscle_group')</label>
                        <div class="control">
                            <div class="select">
                                <select name="muscle-group" id="muscle-group">
                                    @for($i=1; $i<4; $i++)
                                        <option value="{{ $i }}"
                                            @if($i == old('muscle_group_id', $exercise->muscle_group_id))
                                                selected="selected"
                                            @endif>
                                            {{ \App\MuscleGroup::findById($i)->name }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label for="series" class="label">@lang('views.series')</label>
                        <div class="control">
                            <div class="select">
                                <select name="series" id="series">
                                    @for($i=1; $i<6; $i++)
                                        <option value="{{ $i }}"
                                            @if($i == old('series', $exercise->series))
                                                selected="selected"
                                            @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label for="replays" class="label">@lang('views.replays')</label>
                        <div class="control">
                            <div class="select">
                                <select name="replays" id="replays">
                                    @for($i=1; $i<16; $i++)
                                        <option value="{{ $i }}"
                                            @if($i == old('replays', $exercise->replays))
                                                selected="selected"
                                            @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <nav class="level">
                        <div class="level-left"></div>
                        <div class="level-right">
                            <div class="level-item">
                                <div class="field is-grouped">
                                    <p class="control">
                                        <button type="submit" class="button is-success">
                                            @lang('views.save')
                                        </button>
                                        <a href="{{ route('exercises.index') }}" class="button is-light">
                                            @lang('views.cancel')
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </nav>
                </form>
            </div>
        </div>
    </div>
@endsection