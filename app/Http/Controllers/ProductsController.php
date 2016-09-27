<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Products;

class ProductsController extends Controller
{

    private $model;

    public function __construct(Products $products)
    {
        $this->model = $products;
    }

    public function index()
    {
        $products = $this->model->paginate(10);

        return view('products.index', compact('products'));
    }


    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('products.create', compact('categories'));
    }

    public function store(Requests\ProductRequest $request)
    {
        $input = $request->all();

        $product = $this->model->fill($input);

        try{
            $product->save();
            return redirect()->route('products');
        } catch(\Exception $e){
            dd($e->getMessage());
            return view('errors.503');
        }
    }

    public function edit(Category $category, $id)
    {
        $categories = $category->lists('name', 'id');

        $product = $this->model->find($id);

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Requests\ProductRequest $request, $id)
    {
        try{
            $this->model->find($id)->update($request->all());
            return redirect()->route('products');
        } catch (\Exception $e){

        }
    }

    public function destroy($id)
    {
        try{
            $this->model->find($id)->delete();
            return redirect()->route('products');
        } catch (\Exception $e) {

        }
    }
}
