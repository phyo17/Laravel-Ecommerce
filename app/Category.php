<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['parent_id','cat_title','url','description','status'];

    public function categories()
    {
    	return $this->hasmany('App\Category','parent_id');
    }
}
