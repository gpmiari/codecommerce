<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    // liberando mass assigment
    protected $fillable = ['name', 'description', 'price'];
}
