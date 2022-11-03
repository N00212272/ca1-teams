<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;
    // indicating that these fields are guarded
    // all fields are mass assigned
    protected $guarded = [];
    // where if i would want them to be fillable i would change the guarded to fillable like this
    //  protected $fillable = [''];
}
