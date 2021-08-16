<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->validated();

        $product_model = new Product;

        if($request->file('path')){
            $file_name = time().'_'.$request->file('path')->getClientOriginalName();
            $file_path = $request->file('path')->storeAs('post-uploads', $file_name, 'public');

            $product_model->name = $request->name;
            $product_model->description = $request->description;
            $product_model->price = $request->price;
            $product_model->category_id = $request->category;
            $product_model->path = '/storage/' . $file_path;
            $product_model->unit_id = $request->unit_id;

            $product_model->save();
            return redirect()->route('products.index')->with('success','Product created successfully.');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $validated = $request->validated();


        $product->update([
            'name'=> $validated['name'],
            'description'=> $validated['description'],
            'price'=> $validated['price'],
            'unit_id'=> $validated['unit_id']
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }

}
