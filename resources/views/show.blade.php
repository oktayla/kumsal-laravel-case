@extends('layouts.app')

@section('content')
    <div id="show">
        <div id="todos">
            <div id="nav" class="shadow">
                <a href="{{ route('todos') }}">← Back to List</a>
            </div>
            <div class="todo-item shadow {{ $todo->status }}">

                @if( session('success') )
                    <div id="success-msg">{{ session('success') }}</div>
                @endif

                <h2>{{ $todo->title }}</h2>
                <p>{{ $todo->description }}</p>
    
                <div class="todo-actions show">
                    <a href="{{ route('todo.status', $todo->id) }}" class="btn-action status" data-status="{{ $todo->status === 'completed' ? 'incompleted' : 'completed' }}">
                        <span class="circle {{ $todo->status === 'completed' ? 'incompleted' : 'completed' }}"></span>
                    </a>
                    <a href="{{ route('todo.edit', $todo->id) }}">edit</a>
                    <a href="{{ route('todo.delete', $todo->id) }}" class="btn-action delete">delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection