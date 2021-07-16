<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $fillable = [
     'banner','title','description','url','order','is_active'
  ];
}
