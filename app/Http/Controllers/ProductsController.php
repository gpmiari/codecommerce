<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Products;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class ProductsController extends Controller
{

    private $model;

    public function __construct(Products $products)
    {
        $this->model = $products;
    }

    public function index()
    {
        $products = $this->model->all(array('id', 'name', 'description', 'price', 'featured', 'recommend'));
        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }

    public function store(Requests\ProductRequest $request)
    {
        $input = $request->all();

        $product = $this->model->fill($input);

        try{
            $product->save();
            return redirect()->route('products');
        } catch(\Exception $e){
            return view('errors.503');
        }
    }

    public function edit($id)
    {
        $product = $this->model->find($id);

        return view('products.edit', compact('product'));
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
