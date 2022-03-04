<div id="filter">
    <a href="{{ route('todo.create') }}" class="new shadow">+ New</a>
    <a href="{{ route('todos') }}" class="shadow">All Todos</a>
    <a href="{{ route('todos', ['status' => 'completed']) }}" class="completed shadow {{ request('status') === 'completed' ? 'active' : '' }}">Completed</a>
    <a href="{{ route('todos', ['status' => 'incompleted']) }}" class="incompleted shadow {{ request('status') === 'incompleted' ? 'active' : '' }}">Incompleted</a>
</div>