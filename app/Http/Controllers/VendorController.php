<?php

namespace App\Http\Controllers;

use App\Enums\AccountStatus;
use App\Enums\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    public function profile(Request $request) {
        // user to populate the profile form
        $user = $request->user();

        if ($user->permit_no == null) {
            return route('vendor.check-permit');
        }

        return view('vendor.profile', compact('user'));
    }

    public function check_permit(Request $request)
    {
        if ($request->user()->permit_no != null) {
            return redirect()->route('buyer.activate-vendor');
        }
        return view('account.permit-upload')->with('info', 'Please upload you permit and fill in the rest of the fields before proceeding. You can only operate once this is done.');
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

            return redirect()->route('buyer.activate-vendor');
        }
    }

    public function activate_buyer(Request $request)
    {
        $user = $request->user();

        // Deactivate vendor account
        DB::table('role_user')
            ->where('user_id', $user->id)
            ->where('role_id', UserType::Vendor)
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
