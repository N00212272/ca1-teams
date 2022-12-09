<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class team extends Model
{
    use HasFactory;
    // indicating that these fields are guarded
    // all fields are mass assigned
    // protected $guarded = [];
    // where if i would want them to be fillable i would change the guarded to fillable like this
     protected $fillable = ['name','category','description','team_image','owner_id'];

//This is so a different user cant view another users team
    // public function getRouteKeyName()
    // {
    //     return 'uuid';
    // }
    
    //indicates book is part of owner
    //one to many
   public function owner(){
    return $this->belongsTo(Owner::class);
   }

//many to many
public function sponsors(){
    return $this->belongsToMany(Sponsor::class)->withTimestamps();
   }
   //This was to do with user extra functionality
// public function sponsors()
// {
//     return $this->belongstoMany('App\Sponsor' , 'sponsor_team');
// }
}
