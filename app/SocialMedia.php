<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{

     // protected $table = 'privacy_policy';

     protected $fillable = [
        'title','social_media_type_id','icon_class','icon','color','background_color','url','order','is_active'
    ];
}
