<?php

namespace App\Repositories;

use App\Contracts\TodoRepositoryContract;
use App\Models\Todo;
use Exception;
use Illuminate\Http\Request;

class TodoRepository implements TodoRepositoryContract {

    protected $model;

    public function __construct(Todo $todo) {
        $this->model = $todo;
    }

    /**
     * Get all todos.
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll() {
        $query = $this->model->query();

        $query->when( request('status') === 'completed', function($q) {
            return $q->completed();
        });

        $query->when( request('status') === 'incompleted', function($q) {
            return $q->incompleted();
        });

        $query->when( request('s'), function($q) {
            return $q->where('title', 'LIKE', '%'.request('s').'%')
                ->orWhere('description', 'LIKE', '%'.request('s').'%');
        });

        return $query->simplePaginate(10)
            ->withQueryString();
    }

    /**
     * Retrive Todo item with given id
     * 
     * @param int $id
     * @return Todo|null
     */
    public function findById(int $id) {
       return $this->model->find($id);
    }

    /**
     * Create new Todo item with given data
     * 
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model|$this
     */
    public function create(array $data) {
        return $this->model->create($data);
    }

    /**
     * Change Todo item status with given status
     * 
     * @param int $id
     * @return boolean
     * 
     * @throws Exception
     */
    public function statusToggle(int $id) {
        $todo = $this->findById($id);
        if( !$todo ) {
            throw new Exception('No Todo item found.');
        }

        $newStatus = ($todo->status === 'completed' ? 'incompleted' : 'completed');

        return $this->update($id, [
            'status' => $newStatus
        ]);
    }

    /**
     * Update Todo item with given data
     * 
     * @param int $id
     * @param array $data
     * @return int
     */
    public function update(int $id, array $data) {
        return $this->model->where('id', $id)
            ->update($data);
    }

    /**
     * Delete a Todo item with given $id
     * 
     * @param int $id
     * @return boolean
     */
    public function delete($id) {
        return $this->model->destroy($id);
    }

    /**
     * Simple pagination for Todos collection
     * 
     * @param int $perPage
     */
    public function paginate(int $perPage = 10) {
        return $this->model->simplePaginate($perPage);
    }

}