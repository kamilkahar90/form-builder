<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'metadata',
    ];

    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
