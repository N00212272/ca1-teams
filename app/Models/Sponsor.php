<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','bio'];
    
    public function teams()
    {
        return $this->belongstoMany(Team::class)->withTimestamps();
    }
    //  public function teams()
    // {
    //     return $this->belongstoMany('App\Team' , 'sponsor_team');
    // }
}

