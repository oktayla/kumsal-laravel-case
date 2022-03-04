<div id="todos">
    @forelse( $todos as $todo )
        <div class="todo-item shadow {{ $todo->status }}">
            <button class="edit" data-todo="{{ $todo->id }}">edit</button>
            <h2>{{ $todo->title }}</h2>
            <p>{{ $todo->description }}</p>

            <div class="todo-actions hide">
                <a href="{{ route('todo.status', $todo->id) }}" class="btn-action status" data-status="{{ $todo->status === 'completed' ? 'incompleted' : 'completed' }}">
                    <span class="circle {{ $todo->status === 'completed' ? 'incompleted' : 'completed' }}"></span>
                </a>
                <a href="{{ route('todo.show', $todo->id) }}">view</a>
                <a href="{{ route('todo.edit', $todo->id) }}">edit</a>
                <a href="{{ route('todo.delete', $todo->id) }}" class="btn-action delete">delete</a>
            </div>
        </div>
    @empty
        <div class="todo-item shadow">
            <p align="center">There is no todo yet, <a href="{{ route('todo.create') }}">add new todo!</a></p>
        </div>
    @endforelse
</div>