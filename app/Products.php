<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table ="products";
    public function products_type ()
    {	
    	return $this->belongsTo('App\ProductsType','id_type','id');
    }
    public function bill_detail()
    {
    	return $this->hasMany('App\BillDetail','id_products','id');
    }
}

