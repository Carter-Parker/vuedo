<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    public function tasks()
    {
        return $this->hasMany('App\Task', 'task_category_id', 'id');
    }

    public function nonArchivedTasks()
    {
        return $this->tasks()->archived(false)->orderBy('due_date');
    }
}
