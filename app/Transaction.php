<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'transactions';
    public $timestamps = false;

    public function products(){
        return $this->belongsToMany('App\Product','transactions_details','transaction_id','product_id')->withPivot('quantity');
    }
}
