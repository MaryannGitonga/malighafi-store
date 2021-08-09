<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function profile(Request $request) {
        // user to populate the profile form
        $admin = $request->user();

        return view('admin.profile', compact('admin'));
    }
}
