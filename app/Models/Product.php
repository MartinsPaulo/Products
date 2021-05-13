<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','id_category','price','quantity','comments','expiration','imgPath','user'];

    protected $dates = ['expiration'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'id_category', 'id');
    }
}
