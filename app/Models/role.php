<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;



    //this function allows you to do $role->users which will return all users for that role
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_role');
    }
    // public function users(){
    //     return $this->belongsToMany(User::class)->withTimestamps();
    //    }

}

