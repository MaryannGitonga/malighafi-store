<?php

namespace App\Http\Controllers;

use App\Enums\AccountStatus;
use App\Enums\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index(Request $request, $role) {

        $user = $request->user();

        // check account that is active and return view
        if (DB::table('role_user')
            ->where('user_id', $user->id)
            ->where('role_id', UserType::Buyer)
            ->where('status', AccountStatus::Active)
            ->exists()) {
            return view('buyer.profile', compact('user'));
        }elseif (DB::table('role_user')
            ->where('user_id', $user->id)
            ->where('role_id', UserType::Vendor)
            ->where('status', AccountStatus::Active)
            ->exists()) {
                return view('vendor.profile', compact('user'));
        }

    }

    public function update_profile(Request $request)
    {
        // validate form request
        $validated = $request->validate([
            'name' => 'string|max:255',
            'profile_photo' => 'mimes:png,jpg'
        ]);

        // if name value is not empty, update user name
        if($request->has('name')){
            $request->user()->name = $validated['name'];
        }

        if ($request->file()) {
            $file_name = time().'_'.$request->file('profile_photo')->getClientOriginalName();
            $file_path = $request->file('profile_photo')->storeAs('profile_photos', $file_name, 'public');

            $request->user()->profile_photo_path = $file_path;
        }

        // save user instance
        $request->user()->save();

        return redirect()->back()->with('success', 'Profile updated succesfully!');
    }

    public function update_mpesa(Request $request)
    {
        // validate form request
        $validated = $request->validate([
            'mpesa_no' => 'required|string|max:10',
        ]);

        // if mpesa value is not empty, update mpesa number
        if($request->has('mpesa_no')){
            $request->user()->mpesa_no = $validated['mpesa_no'];
        }

        // save user instance
        $request->user()->save();

        return redirect()->back()->with('success', 'Mpesa number updated succesfully!');
    }

    public function update_address(Request $request)
    {
        // validate form request
        $validated = $request->validate([
            'postal_address' => 'string|max:225',
            'zip_code' => 'string|max:225',
            'physical_address' => 'string|max:225',
            'county' => 'string|max:225',
        ]);

        // if mpesa value is not empty, update mpesa number
        if($request->has('postal_address')){
            $request->user()->postal_address = $validated['postal_address'];
        }
        if($request->has('zip_code')){
            $request->user()->zip_code = $validated['zip_code'];
        }
        if($request->has('physical_address')){
            $request->user()->physical_address = $validated['physical_address'];
        }
        if($request->has('county')){
            $request->user()->county = $validated['county'];
        }

        // save user instance
        $request->user()->save();

        return redirect()->back()->with('success', 'Address details updated succesfully!');
    }

    // public function check_permit(Request $request)
    // {
    //     if ($request->user()->permit_no == null) {
    //         return redirect()->view('vendor.permit-upload')->with('info', 'Please upload you permit and fill in the rest of the fields before proceeding. You can only operate once this is done.');
    //     }
    //     return redirect()->route('account.activate-vendor');
    // }

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

            return redirect()->route('account.activate-vendor');
        }
    }

    public function activate_vendor(Request $request)
    {
        $user = $request->user();

        if ($request->user()->permit_no == null) {
            return redirect()->view('vendor.permit-upload')->with('info', 'Please upload you permit and fill in the rest of the fields before proceeding. You can only operate once this is done.');
        }

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
        ->where('role_id', UserType::Vendor)
        ->doesntExist())
        {
            DB::table('role_user')->insert([
                'user_id' => $user->id,
                'role_id' => UserType::Vendor,
                'status' => AccountStatus::Active
            ]);
        }

        // Otherwise
        DB::table('role_user')
            ->where('user_id', $user->id)
            ->where('role_id', UserType::Vendor)
            ->update([
            'status' => AccountStatus::Active
        ]);

        return redirect()->route('account.index');
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

        return redirect()->route('account.index');
    }
}
