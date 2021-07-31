<?php

namespace App\Http\Controllers;

use App\Enums\AccountStatus;
use App\Enums\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
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
}
