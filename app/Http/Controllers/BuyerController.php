<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class BuyerController extends Controller
{
    public function profile(Request $request) {
        // user to populate the profile form
        $user = $request->user();

        // Create a token incase the user wants to reset their password
        DB::table('password_resets')->insert([
            'email' => $request->user()->email,
            'token' => bcrypt(Str::random(60)),
            'created_at' => Carbon::now()
        ]);

        return view('buyer.profile', compact('user'));
    }

    public function update_profile(Request $request)
    {
        // validate form request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // if name value is not empty, update user name
        if($request->has('name')){
                $request->user()->name = $validated['name'];
        }

        // save user instance
        $request->user()->save();

        return redirect('/profile')->with('success', 'Name updated succesfully!');
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

        return redirect('/profile')->with('success', 'Mpesa number updated succesfully!');
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

        return redirect('/profile')->with('success', 'Address details updated succesfully!');
    }


}
