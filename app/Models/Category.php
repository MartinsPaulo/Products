<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','active'];

    public function category(){
        return $this->hasOne('App\Models\Product', 'id_category', 'id');
    }
    

}
