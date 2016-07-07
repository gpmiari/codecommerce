<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    private $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function index()
    {
        return view('categories.index');
    }

}