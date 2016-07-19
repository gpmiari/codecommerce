<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function index()
    {
        $categories = $this->model->all(array('id', 'name', 'description'));
        return view('categories.index', compact('categories'));
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Requests\CategoryRequest $request){
        $input = $request->all();

        $category = $this->model->fill($input);

        try{
            $category->save();
            return redirect('categories');
        } catch(Exception $e){
            return view('errors.503');
        }
    }

}
