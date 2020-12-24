<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'categories';
    public $timestamps = false;

    public function product(){
        return $this->hasOne('App\Product');
    }
}
