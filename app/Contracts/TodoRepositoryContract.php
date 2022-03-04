<?php

namespace App\Contracts;

interface TodoRepositoryContract {
    public function getAll();
    public function findById(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function statusToggle(int $id);
    public function delete(int $id);
    public function paginate(int $perPage);
}