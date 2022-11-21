<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;


    //returns the owners teams
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
