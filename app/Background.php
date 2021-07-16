<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
  protected $fillable = [
     'banner','section','is_active'
  ];
}
