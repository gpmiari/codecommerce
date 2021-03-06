<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // liberando mass assigment
    protected $fillable = ['name', 'description'];

    protected $dates = ['deleted_at', 'updated_at', 'created_at'];
}
