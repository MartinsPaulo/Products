<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','id_category','price','quantity','comments','expiration','imgPath'];

    protected $dates = ['expiration'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'id_category', 'id');
    }
}
