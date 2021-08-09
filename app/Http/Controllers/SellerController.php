<?php

namespace App\Http\Controllers;

use App\Enums\AccountStatus;
use App\Enums\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    // Products
    public function products()
    {
        $string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        return view('seller.products', compact('string'));
    }

    // Product Edit
    public function edit_product()
    {
        return view('products.edit');
    }

    // Profile Module
    public function profile(Request $request) {
        // user to populate the profile form
        $user = $request->user();

        return view('seller.profile', compact('user'));
    }

    public function check_permit(Request $request)
    {
        if ($request->user()->permit_no == null) {
            return view('seller.permit-upload')->with('info', 'Please upload you permit and fill in the rest of the fields before proceeding. You can only operate once this is done.');
        }
        return redirect()->route('buyer.activate-seller');
    }

    public function upload_permit(Request $request)
    {
        if ($request->user()->permit_no == null) {
            $request->validate([
                'kra_pin' => 'required|string|max:225',
                'permit_no' => 'required|string|max:225',
                'permit_upload' => 'required|mimes:pdf,docx,csv,txt',
            ]);

            if ($request->file()) {
                $file_name = time().'_'.$request->file('permit_upload')->getClientOriginalName();
                $file_path = $request->file('permit_upload')->storeAs('permit_uploads', $file_name, 'public');

                $request->user()->kra_pin = $request['kra_pin'];
                $request->user()->permit_no = $request['permit_no'];
                $request->user()->permit_upload_path = $file_path;
                $request->user()->save();
            }

            return redirect()->route('buyer.activate-seller');
        }
    }

    public function activate_buyer(Request $request)
    {
        $user = $request->user();

        // Deactivate seller account
        DB::table('role_user')
            ->where('user_id', $user->id)
            ->where('role_id', UserType::Seller)
            ->update([
                'status' => AccountStatus::Disabled
            ]);

        // if buyer account doesn't exists, create an instance
        if(DB::table('role_user')
        ->where('user_id', $user->id)
        ->where('role_id', UserType::Buyer)
        ->doesntExist())
        {
            DB::table('role_user')->insert([
                'user_id' => $user->id,
                'role_id' => UserType::Buyer,
                'status' => AccountStatus::Active
            ]);
        }

        // Otherwise
        DB::table('role_user')
            ->where('user_id', $user->id)
            ->where('role_id', UserType::Buyer)
            ->update([
            'status' => AccountStatus::Active
        ]);

        return redirect()->route('buyer.profile');
    }
}
