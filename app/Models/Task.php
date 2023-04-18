<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'workflow_id',
        'name',
        'description',
        'status',
        'form_id',
        'submission_id',
    ];

    public function workflow()
    {
        return $this->belongsTo(Workflow::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
