<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tasks');
    }

    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }
}
