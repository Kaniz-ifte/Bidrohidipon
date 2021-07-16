<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
  protected $fillable = [
     'intro','description','profile_image','imdb_url','order','is_active'
  ];
}
