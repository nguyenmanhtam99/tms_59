<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_subjects');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_subjects');
    }
}
