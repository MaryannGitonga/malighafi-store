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
        $orders = Order::all();
        $products = Product::all();
        $revenue = 0;

        $chart_items = array();

        // products in each category
        $categories = Category::all();
        $chart_categories = array();

        foreach ($categories as $category) {
            array_push($chart_categories, [
                $category->name => $category->products()->count()
            ]);
        }

        return view('dashboard', compact('users', 'orders', 'products', 'revenue', 'chart_categories'));
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
