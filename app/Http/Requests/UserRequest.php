<?php

namespace App\Http\Requests;

use App\Enums\AccountStatus;
use App\Enums\UserType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'profile_photo_path' => 'mimes:png,jpg',
            'role_id' => 'required',
            'mpesa_no' => '',
            'postal_address' => '',
            'zip_code' => '',
            'physical_address' => '',
            'county' => '',
            'kra_pin' => '',
            'permit_no' => '',
            'permit_upload_path' => ''
        ];
    }
}
