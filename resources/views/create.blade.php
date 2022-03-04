@extends('layouts.app')

@section('content')
    <div id="create">
        <div id="todos">
            <div id="nav" class="shadow">
                <a href="{{ route('todos') }}">← Back to List</a>
            </div>
            <div class="todo-item shadow">

                @if( session('success') )
                    <div id="success-msg">{{ session('success') }}</div>
                @endif

                <form id="todo-form" action="{{ route('todo.store') }}" method="POST" validate>
                    @csrf
                    
                    @if( $errors->all() )
                        <div id="errors">
                            @foreach( $errors->all() as $error )
                                <p>{{ print_r($error, true) }}</p>
                            @endforeach
                        </div>
                    @endif

                    <div class="form-data">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" placeholder="type a title..." required>
                    </div>
                    
                    <div class="form-data">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="Todo item description"></textarea>
                    </div>

                    <div class="form-data" align="right">
                        <button id="submit" type="submit">CREATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection