<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     *
     */
    const ROLE_ADMIN = 1;
    const ROLE_USER = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'user_courses');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'user_subjects');
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'user_tasks');
    }

    public function isAdmin(){
        return $this->role == User::ROLE_ADMIN;
    }
}
