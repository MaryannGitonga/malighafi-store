<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678')
        ]);

        $user->roles()->attach($request->role_id);

        if($request->file('profile_photo_path')){
            $file_name = time().'_'.$request->file('path')->getClientOriginalName();
            $file_path = $request->file('path')->storeAs('profile_uploads', $file_name, 'public');

            if ($request->has('profile_photo_path')) {
                $user->profile_photo_path = '/storage/' . $file_path;
            }
        }

        if ($request->has('mpesa_no')) {
            $user->mpesa_no = $request->mpesa_no;
        }
        if ($request->has('kra_pin')) {
            $user->kra_pin = $request->kra_pin;
        }
        if ($request->has('permit_no')) {
            $user->permit_no = $request->permit_no;
        }
        if ($request->has('permit_upload_path')) {
            $user->permit_upload_path = $request->permit_upload_path;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $request->validated();

        if($request->file('profile_photo_path')){
            $file_name = time().'_'.$request->file('path')->getClientOriginalName();
            $file_path = $request->file('path')->storeAs('profile_uploads', $file_name, 'public');

            if ($request->has('profile_photo_path')) {
                $user->profile_photo_path = '/storage/' . $file_path;
            }

        }

        if ($request->has('name')) {
            $user->name = $request->name;
        }
        if ($request->has('email')) {
            $user->email = $request->email;
        }
        if ($request->has('role_id')) {
            $user->role_id = $request->role_id;
        }
        if ($request->has('mpesa_no')) {
            $user->mpesa_no = $request->mpesa_no;
        }
        if ($request->has('postal_address')) {
            $user->postal_address = $request->postal_address;
        }
        if ($request->has('zip_code')) {
            $user->zip_code = $request->zip_code;
        }
        if ($request->has('physical_address')) {
            $user->physical_address = $request->physical_address;
        }
        if ($request->has('county')) {
            $user->county = $request->county;
        }

        $user->save();

        return redirect()->route('users.index')->with('success','User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
