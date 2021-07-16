<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
     protected $fillable = [
       'group','title','type','value','order','key','is_active'
    ];
}
