<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload-product');
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

        $productModel = new Product;

        if($request->file('path')){
            $fileName = time().'_'.$request->file('path')->getClientOriginalName();
            $filePath = $request->file('path')->storeAs('uploads', $fileName, 'public');

            $productModel->name = $request->name;
            $productModel->description = $request->description;
            $productModel->price = $request->price;
            $productModel->category = $request->category;
            $productModel->path = '/storage/' . $filePath;

            $productModel->save();
            return redirect()->route('products.create')->with('success','Product created successfully.');

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
