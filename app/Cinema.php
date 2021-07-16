<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
  protected $fillable = [
     'title','url','banner','category_id','order','is_restricted','is_active'
  ];
}
