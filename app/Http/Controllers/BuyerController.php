<?php

namespace App\Http\Controllers;

use App\Enums\AccountStatus;
use App\Enums\InboxMessageStatus;
use App\Enums\UserType;
use App\Models\InboxMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;

class BuyerController extends Controller
{
    public function profile(Request $request)
    {
        // user to populate the profile form
        $user = $request->user();
        $messages = DB::table('inbox_messages')
            ->where('status', InboxMessageStatus::Unread)
            ->where('user_id', $request->user()->id)
            ->get();

        return view('buyer.profile', compact('messages', 'user'));
    }

    public function activate_seller(Request $request)
    {
        $user = $request->user();

        // Deactivate buyer account
        DB::table('role_user')
            ->where('user_id', $user->id)
            ->where('role_id', UserType::Buyer)
            ->update([
                'status' => AccountStatus::Disabled
            ]);

        // if vendor account doesn't exists, create an instance
        if (DB::table('role_user')
            ->where('user_id', $user->id)
            ->where('role_id', UserType::Seller)
            ->doesntExist()
        ) {
            DB::table('role_user')->insert([
                'user_id' => $user->id,
                'role_id' => UserType::Seller,
                'status' => AccountStatus::Active
            ]);
        }

        // Otherwise
        DB::table('role_user')
            ->where('user_id', $user->id)
            ->where('role_id', UserType::Seller)
            ->update([
                'status' => AccountStatus::Active
            ]);

        return redirect()->route('seller.profile');
    }

    public function wishlist(Request $request)
    {
        $messages = DB::table('inbox_messages')
            ->where('status', InboxMessageStatus::Unread)
            ->where('user_id', $request->user()->id)
            ->get();

        return view('buyer.wishlist', compact('messages'));
    }

    public function orders(Request $request)
    {
        $messages = DB::table('inbox_messages')
            ->where('status', InboxMessageStatus::Unread)
            ->where('user_id', $request->user()->id)
            ->get();

        $orders = Order::where('user_id', Auth::user()->id)->get();

        $order_items = DB::table('order_product')->get();

        $buyer_orders = array();

        foreach ($orders as $order) {
            foreach ($order_items as $item) {
                if ($order->id == $item->order_id) {
                    array_push($buyer_orders, $item);
                }
            }

        }

        return view('buyer.orders', compact('buyer_orders', 'messages'));
    }

    public function inbox(Request $request)
    {
        DB::table('inbox_messages')
            ->where('user_id', $request->user()->id)
            ->where('status', InboxMessageStatus::Unread)
            ->update([
                'status' => InboxMessageStatus::Read
            ]);

        $messages = DB::table('inbox_messages')
            ->where('user_id', $request->user()->id)
            ->get();

        return view('buyer.inbox', compact('messages'));
    }

    public function cart(Request $request)
    {
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


       return view('buyer.cart', compact('products','total_price'));
    }

    public function checkout_info(Request $request)
    {
        $user = User::where('id', Auth::id())->get();
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
        return view('buyer.checkout-info', compact('user','products','total_price'));
    }

    public function payment(Request $request)
    {
        $user_details = DB::table('users')->where('id',Auth::id())->first();
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
        return view('buyer.payment',compact('user_details','products','total_price'));
    }
}
