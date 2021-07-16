<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Still extends Model
{
  protected $fillable = [
     'banner','title','url','order','is_active'
  ];
}
