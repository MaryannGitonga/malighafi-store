<?php

namespace App\Http\Controllers;

use App\Enums\AccountStatus;
use App\Enums\UserType;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request) {

        if ($request->user()->roles()->where('role_id', UserType::Seller)->first() != null) {
            if ($request->user()->roles()->where('role_id', UserType::Seller)->first()->pivot->status == AccountStatus::Active) {
                return view('products.index');
            }
        }
        if ($request->user()->roles()->where('role_id', UserType::Administrator)->first() != null) {
            if ($request->user()->roles()->where('role_id', UserType::Administrator)->first()->pivot->status == AccountStatus::Active) {
                return view('products.index');
            }
        }
        $products = Product::all();
        return view('dashboard', compact('products'));
    }
}
