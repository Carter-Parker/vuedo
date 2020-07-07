<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    /**
    * The attributes that are mot mass assignable
    *
    * We're using foprm requests for validation so this is safe.
    *
    * @var array
    */
    protected $guarded = [];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['due_date', 'created_at'];

    /**
    * Autoload the taskCategory relation which allows us too...
    *
    * @var array
    */
    protected $with = ['taskCategory'];


    /**
    * ...use a nice helper function to get the category name
    */

    public function getTaskCategoryNameAttribute()
    {
        return $this->taskCategory->name;
    }

    /**
    * The task category relation
    **/
    public function taskCategory()
    {
        return $this->hasOne('\App\TaskCategory', 'id', 'task_category_id');
    }

    /**
    *    Convert date to corect format for db insertion
    */
    public function setDueDateAttribute($date)
    {
        $this->attributes['due_date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    /**
    * Scope to make handling archived status simpler
    */
    public function scopeArchived($query, $value)
    {
        return $query->where('archived', $value);
    }
}
