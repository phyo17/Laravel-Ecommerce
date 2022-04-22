<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['category_id','product_name','product_code','product_color','product_description','product_image','product_price','product_quantity'];


    public function category()
    {
    	return $this->belongsTo('App\Category','category_id','id');
    }
}
