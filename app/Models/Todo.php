<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'status'];

    /**
     * Scope a query to get only incompleted todos.
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIncompleted($query) {
        return $query->where('status', 'incompleted');
    }

    /**
     * Scope a query to get only completed todos.
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCompleted($query) {
        return $query->where('status', 'completed');
    }
}
