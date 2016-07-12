<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['achivement', 'next_plan', 'problem'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
