<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Buyer;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
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
        //
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
            "quantity" => "required"
        ]);

        $cart_model = new Cart;

        $cart_model->user_id = Auth::id();
        $cart_model->product_id = $request->product;
        $cart_model->quantity = $request->quantity;

        $cart_model->save();

        return redirect()->back()->with('success', 'Cart updated succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
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
    public function delete_cart_item($product_id)
    {
        $user_id = Auth::id();
        DB::table('carts')->where('user_id', $user_id)->where('product_id', $product_id)->delete();
        return redirect()->back()->with('success', 'Item deleted succesfully!');
    }

    public function update_user(Request $request)
    {
        $request->validate([
            "user_name" => "required",
            "email" => "required",
            "phone" => "required",
            "physicalAddress" => "required",
            "county" => "required",
            "postal" => "required",
            "zip" => "required"
        ]);

        $user = User::find(Auth::id());
        if ($request->save != "") {
            $user->name = $request->user_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->physical_address = $request->physicalAddress;
            $user->county = $request->county;
            $user->postal_address = $request->postal;
            $user->zip_code = $request->zip;
            $user->save();


            $user_details = DB::table('users')->where('id', Auth::id())->first();
            $cart_items = DB::table('carts')->where('user_id', Auth::id())->get();
            // print_r($cart_items);
            $products = [];
            $total_price = 0;
            foreach ($cart_items as $item) {
                $order_items = DB::table('products')->where('id', $item->product_id)->first();
                array_push($products, array(
                    "image" => $order_items->path,
                    "id" => $order_items->id,
                    "name" => $order_items->name,
                    "price" => ($order_items->price * $item->quantity),
                    "quantity" => $item->quantity
                ));
                $total_price += ($order_items->price * $item->quantity);
            }
            return redirect()->route('buyer.payment');
        } else {
            $user_details = DB::table('users')->where('id', Auth::id())->first();
            $cart_items = DB::table('carts')->where('user_id', Auth::id())->get();
            // print_r($cart_items);
            $products = [];
            $total_price = 0;
            foreach ($cart_items as $item) {
                $order_items = DB::table('products')->where('id', $item->product_id)->first();
                array_push($products, array(
                    "image" => $order_items->path,
                    "id" => $order_items->id,
                    "name" => $order_items->name,
                    "price" => ($order_items->price * $item->quantity),
                    "quantity" => $item->quantity
                ));
                $total_price += ($order_items->price * $item->quantity);
            }
            return redirect()->route('buyer.payment');
        }
    }
}
