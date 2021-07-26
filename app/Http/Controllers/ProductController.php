<?php

namespace App\Http\Controllers;

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
         $products = DB::table('products')
        ->get();
        return view('view-products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('upload-product',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'category' => ['required'],
            'path' => ['required','mimes:jpg,jpeg,gif,png,pdf']
        ]);

        $product_model = new Product;

        if($request->file('path')){
            $file_name = time().'_'.$request->file('path')->getClientOriginalName();
            $file_path = $request->file('path')->storeAs('post-uploads', $file_name, 'public');

            $product_model->name = $request->name;
            $product_model->description = $request->description;
            $product_model->price = $request->price;
            $product_model->category_id = $request->category;
            $product_model->path = '/storage/' . $file_path;
            $product_model->units = $request->units;

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
        return view('edit-image',compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required']
        ]);


            // $file_name = time().'_'.$request->file('path')->getClientOriginalName();
            // $file_path = $request->file('path')->storeAs('post-uploads', $file_name, 'public');


            $product->update(['name'=> $request->name]);
            $product->update(['description'=> $request->description]);
            $product->update(['price'=> $request->price]);
            $product->update(['units'=> $request->units]);

            return redirect()->route('products.index');



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
