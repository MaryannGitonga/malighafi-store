<?php

namespace App\Http\Controllers;

use App\Enums\AccountStatus;
use App\Enums\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BuyerController extends Controller
{
    public function profile(Request $request) {
        // user to populate the profile form
        $user = $request->user();

        return view('buyer.profile', compact('user'));
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

}
