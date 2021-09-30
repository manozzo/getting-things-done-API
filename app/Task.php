<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $table = 'tasks';      
    protected $primaryKey = 'id';   
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date',
        'is_completed',
        'task_start',
        'task_end',
    ];
    protected $dates = [
        'created_at',        
        'updated_at',
        'deleted_at',
    ];
    public function userRelation() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
