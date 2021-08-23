<?php

namespace App\Http\Controllers;

use App\Enums\AccountStatus;
use App\Enums\UserType;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }

    public function index() {

        if (Auth::user() != null) {
            if (Auth::user()->roles->where('role_id', UserType::Seller)->first() != null) {
                if (Auth::user()->roles->where('role_id', UserType::Seller)->first()->pivot->status == AccountStatus::Active) {
                    return view('products.index');
                }
            }
            else if (Auth::user()->roles->where('role_id', UserType::Administrator)->first() != null) {
                if (Auth::user()->roles->where('role_id', UserType::Administrator)->first()->pivot->status == AccountStatus::Active) {
                    return view('products.index');
                }
            }
            else{
                $products = Product::all();
                return view('product-index', compact('products'));
            }
        }
        $products = Product::all();
        return view('product-index', compact('products'));
    }

    public function contact()
    {
        return view('contact');
    }
}
