<?php

namespace App\Http\Controllers;

use App\Contracts\TodoRepositoryContract;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Traits\TodoJsonResponse;
use Exception;

class TodoController extends Controller {

    use TodoJsonResponse;

    private $todoRepository;

    public function __construct(TodoRepositoryContract $todoRepository) {
        $this->todoRepository = $todoRepository;
    }

    public function index() {
        $todos = $this->todoRepository->getAll();

        return view('todo', compact('todos'));
    }

    public function create() {
        return view('create');
    }

    public function store(TodoRequest $request) {
        $data = $request->validated();

        $todo = $this->todoRepository->create($data);

        return redirect()->route('todo.show', $todo->id)->with('success', 'New Todo item was added successfully.');
    }

    public function show(int $id) {
        $todo = $this->todoRepository->findById($id);
        if( !$todo ) {
            abort(404, 'No Todo found.');
        }

        return view('show', compact('todo'));
    }

    public function edit(int $id) {
        $todo = $this->todoRepository->findById($id);
        if( !$todo ) {
            abort(404, 'No Todo found.');
        }

        return view('edit', compact('todo'));
    }

    public function update(TodoRequest $request, $id) {
        $data = $request->validated();

        $this->todoRepository->update($id, $data);

        return back()->with('success', 'Todo item was updated successfully.');
    }

    public function statusToggle(int $id) {
        try {
            $affected = $this->todoRepository->statusToggle($id);

            if( $affected > 0 ) {
                return $this->success('Todo item\'s status was changed.');
            }
        } catch(Exception $e) {
            return $this->error( $e->getMessage() );
        }
    }

    public function delete(int $id) {
        $deleted = $this->todoRepository->delete($id);  

        if( $deleted ) {
            return $this->success('Todo item was deleted successfully.');
        }

        return $this->error('Todo item has already deleted before.');
    }
}
