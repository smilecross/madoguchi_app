<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualTask extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'task_id',
        'task_name',
        'deadline_days'
    ];

    public function taskDetails()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

}
