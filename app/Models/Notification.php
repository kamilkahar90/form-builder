<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'workflow_id',
        'task_id',
        'recipient',
        'subject',
    ];

    public function workflow()
    {
        return $this->belongsTo(Workflow::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
