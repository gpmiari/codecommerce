<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    // liberando mass assigment
    protected $fillable = ['name', 'description', 'price', 'featured', 'recommend', 'category_id'];

    public function category() {
        return $this->belongsTo('CodeCommerce\Category', 'category_id');
    }

}
