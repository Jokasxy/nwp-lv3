<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'completed',
        'start',
        'end'
    ];

    public function users()
    {
        $user_id = Auth::user()->getId();
        return $this->belongsToMany('App\Models\User', 'project_users')->wherePivot('user_id', $user_id);
    }
}
