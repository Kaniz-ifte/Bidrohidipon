<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mention extends Model
{
  protected $fillable = [
     'banner','title','url','order','is_restricted','is_active'
  ];
}
