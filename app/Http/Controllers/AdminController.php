<?php

namespace App\Http\Controllers;

use App\Enums\InboxMessageStatus;
use App\Events\PermitApproved;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function profile(Request $request) {
        // user to populate the profile form
        $admin = $request->user();

        $messages = DB::table('inbox_messages')
        ->where('status', InboxMessageStatus::Unread)
        ->where('user_id', $request->user()->id)
        ->get();

        return view('admin.profile', compact('admin', 'messages'));
    }

    public function dashboard()
    {
        $users = User::all();
        $orders = DB::table('order_product')->get();
        $products = Product::all();
        $revenue = 0;

        foreach ($orders as $item) {
            $revenue += ($item->quantity * $item->price);
        }

        $admin_graph = array();

        foreach ($orders as $order) {
            $product = Product::find($order->product_id);
            $total = $orders->where('product_id', $order->product_id)->sum('quantity');
            array_push($admin_graph, [
                "product" => $product->name,
                "total" => $total
            ]);
        }

        $seller_orders = array();
        $seller_revenue = 0;
        foreach ($orders as $item) {
            $product = Product::find($item->product_id);
            if ($product->seller->id == Auth::user()->id) {
                array_push($seller_orders, $item);
                $seller_revenue += ($item->quantity * $item->price);
            }
        }

        $chart_items = array();

        // products in each category
        $categories = Category::all();
        $chart_categories = array();

        foreach ($categories as $category) {
            array_push($chart_categories, [
                $category->name => $category->products()->count()
            ]);
        }

        return view('dashboard', compact('users', 'orders', 'products', 'revenue', 'chart_categories', 'seller_orders', 'seller_revenue'));
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

        return view('admin.inbox', compact('messages'));
    }

    public function download_permit(User $user)
    {
        $file = Storage::disk('public')->get($user->permit_upload_path);

        return (new Response($file, 200))->header('Content-Type', 'application/pdf');

    }

    public function verify_seller(User $user)
    {
        $user->permit_approved = true;
        $user->save();

        PermitApproved::dispatch($user);

        return redirect()->route('users.index')->with('success', 'Seller account has been verified successfully!');
    }
}
