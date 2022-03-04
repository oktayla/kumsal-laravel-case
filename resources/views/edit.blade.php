@extends('layouts.app')

@section('content')
    <div id="edit">
        <div id="todos">
            <div id="nav" class="shadow">
                <a href="{{ route('todos') }}">← Back to List</a>
            </div>
            <div class="todo-item shadow {{ $todo->status }}">

                @if( session('success') )
                    <div id="success-msg">{{ session('success') }}</div>
                @endif

                <form id="todo-form" action="{{ route('todo.update', $todo->id) }}" method="POST" validate>
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
                        <input type="text" name="title" id="title" value="{{ $todo->title }}" required>
                    </div>
                    
                    <div class="form-data">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10">{{ $todo->description }}</textarea>
                    </div>

                    <div class="form-data" align="right">
                        <button id="submit" type="submit">UPDATE</button>
                    </div>
                </form>
    
                <div class="todo-actions show">
                    <a href="{{ route('todo.status', $todo->id) }}" class="btn-action status" data-status="{{ $todo->status === 'completed' ? 'incompleted' : 'completed' }}">
                        <span class="circle {{ $todo->status === 'completed' ? 'incompleted' : 'completed' }}"></span>
                    </a>
                    <a href="{{ route('todo.show', $todo->id) }}">view</a>
                    <a href="{{ route('todo.delete', $todo->id) }}" class="btn-action delete">delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection