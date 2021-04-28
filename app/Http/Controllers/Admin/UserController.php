<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('admin/user/index', [
            'users' => User::get()
        ]);
    }

    public function create(){
        return view('admin/user/create', [
            'user' => New User,
            'submit' => 'Create'
        ]);
    }

    public function save(User $user){
        request()->validate([
            'name' => 'required',
            'username' => 'required|unique:Users', 
            'role' => 'required',
            'password' => 'required',
        ]);

        // dd(request()); exit();

        User::create([
            'name' => request('name'),
            'username' => request('username'),
            'role' => request('role'),
            'password' => Hash::make(request('password')),
            'status' => 1,
        ]);

        return redirect()->route('admin.data.user')->with('success', 'User berhasil ditambahkan');
    }

    public function edit(){
        return view('admin/user/edit', [
            'user' => New User,
            'submit' => 'Update'
        ]);
    }
}
