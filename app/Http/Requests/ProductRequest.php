<?php

namespace App\Http\Requests;

use App\Enums\AccountStatus;
use App\Enums\UserType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return DB::table('role_user')
        ->where('user_id', Auth::user()->id)
        ->where('role_id', UserType::Administrator)
        ->where('status', AccountStatus::Active)
        ->exists() || DB::table('role_user')
        ->where('user_id', Auth::user()->id)
        ->where('role_id', UserType::Seller)
        ->where('status', AccountStatus::Active)
        ->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => '',
            'description' => '',
            'price' => '',
            'category_id' => '',
            'unit_id' => '',
            'path' => 'mimes:jpg,jpeg,gif,png,pdf'
        ];
    }
}
