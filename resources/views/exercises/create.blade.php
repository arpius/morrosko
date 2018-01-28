@extends('layout')

@section('title', 'Create new exercise')

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Create new exercise</p>
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

                <form method="POST" action="{{ url('exercises') }}">
                    {{ csrf_field() }}

                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <div class="control">
                            <input type="text" class="input" name="name" placeholder="Jumping jack">
                        </div>
                    </div>

                    <div class="field">
                        <label for="description" class="label">Description</label>
                        <div class="control">
                            <input type="text" class="input" name="description"
                                   placeholder="Jumping to a position with the legs spread wide and the hands touching overhead...">
                        </div>
                    </div>

                    <div class="field">
                        <label for="muscle-group" class="label">Muscle group</label>
                        <div class="control">
                            <div class="select">
                                <select name="muscle-group" id="muscle-group">
                                    @for($i=1; $i<4; $i++)
                                        <option value="{{ $i }}">
                                            {{ \App\MuscleGroup::findById($i)->name }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label for="series" class="label">Series</label>
                        <div class="control">
                            <div class="select">
                                <select name="series" id="series">
                                    @for($i=1; $i<6; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label for="replays" class="label">Replays</label>
                        <div class="control">
                            <div class="select">
                                <select name="replays" id="replays">
                                    @for($i=1; $i<16; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
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
                                        <button type="submit" class="button is-success">Save</button>
                                        <a href="{{ route('exercises.index') }}" class="button is-light">Cancel</a>
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