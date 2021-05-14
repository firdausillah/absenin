<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UserImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Session;

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

    public function edit(User $user){
        return view('admin/user/edit', [
            'user' => $user,
            'submit' => 'Update'
        ]);
    }

    public function update(User $user)
    {
        request()->validate([
            'name' => 'required',
            'username' => 'required|unique:Users,username,' .$user->id,
            'role' => 'required',
            'password' => 'required',
        ]);

        // dd(request()); exit();

        $user->update([
            'name' => request('name'),
            'username' => request('username'),
            'role' => request('role'),
            'password' => Hash::make(request('password')),
            'status' => 1,
        ]);

        return redirect()->route('admin.data.user')->with('success', 'User berhasil diubah');
    }

    public function destroy(User $user){
        $user->delete();
        return back()->with('success', 'data'. $user->name . ' Berhasil Dihapus!');
    }

    public function deleteAll(Request $request){
        $ids = $request->ids;
        User::whereIn('id', $ids)->delete();
        return response()->json(['success'=>"user berhasil di hapus"]);
    }

    public function importUser(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_user di dalam folder public
        $file->move('file_user', $nama_file);

        // import data
        Excel::import(new UserImport, public_path('/file_user/' . $nama_file));

        // notifikasi dengan session
        return redirect()->route('admin.data.user')->with('success', 'User berhasil diimport');
    }
}
