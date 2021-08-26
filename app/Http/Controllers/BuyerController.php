<?php

namespace App\Http\Controllers;

use App\Enums\AccountStatus;
use App\Enums\InboxMessageStatus;
use App\Enums\UserType;
use App\Models\InboxMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BuyerController extends Controller
{
    public function profile(Request $request) {
        // user to populate the profile form
        $user = $request->user();
        $messages = DB::table('inbox_messages')
        ->where('status', InboxMessageStatus::Unread)
        ->where('user_id', $request->user()->id)
        ->get();

        return view('buyer.profile', compact('messages','user'));
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
        if(DB::table('role_user')
        ->where('user_id', $user->id)
        ->where('role_id', UserType::Seller)
        ->doesntExist())
        {
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

        return view('buyer.orders', compact('messages'));
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
        return view('buyer.cart');
    }

    public function checkout_info(Request $request)
    {
        return view('buyer.checkout-info');
    }

    public function payment(Request $request)
    {


        return view('buyer.payment');
    }

}
