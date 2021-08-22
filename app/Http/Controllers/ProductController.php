<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        $users = User::all();

        $sellers = array();

        foreach ($users as $user) {
            if (DB::table('role_user')->where('user_id', $user->id)->where('role_id', UserType::Seller)->exists()) {
                array_push($sellers, $user);
            }
        }
        return view('products.create',compact('categories', 'units', 'sellers'));
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
            $file_path = $request->file('path')->storeAs('post_uploads', $file_name, 'public');

            $product_model->name = $request->name;
            $product_model->description = $request->description;
            $product_model->price = $request->price;
            $product_model->category_id = $request->category_id;
            $product_model->path = 'storage/post_uploads' . $file_path;
            $product_model->unit_id = $request->unit_id;
            $product_model->seller_id = ($request->user()->roles()->where('role_id', UserType::Administrator)->first() != null) ? $request->seller_id : $request->user()->id;

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
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $units = Unit::all();
        $categories = Category::all();
        return view('products.edit',compact('product', 'units', 'categories'));

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

        if ($request->has('name')) {
            $product->name = $validated['name'];
        }
        if ($request->has('description')) {
            $product->description = $validated['description'];
        }
        if ($request->has('price')) {
            $product->price = $validated['price'];
        }
        if ($request->has('unit_id')) {
            $product->unit_id = $validated['unit_id'];
        }
        if ($request->has('category_id')) {
            $product->category_id = $validated['category_id'];
        }

        $product->save();

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
