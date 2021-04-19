<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\{Hour};

class HourController extends Controller
{
    public function __invoke()
    {
        return view('admin/hour/guru', [
            'hours' => Hour::where('level', 'guru')->get()
        ]);
    }

    public function siswa(){
        return view('admin/hour/siswa', [
            'hours' => Hour::where('level', 'siswa')->get()
        ]);
    }

    public function createGuru(){
        return view('admin/hour/hour-create', [
            'hour' => new Hour,
            'submit' => 'Create',
            'level' => 'guru'
        ]);
    }

    public function createSiswa(){
        return view('admin/hour/hour-create', [
            'hour' => new Hour,
            'submit' => 'Create',
            'level' => 'siswa'
        ]);
    }

    public function save(Hour $hour){
        // dd(request('level'));
        request()->validate([
            'absen_dibuka' => 'required',
            'absen_ditutup' => 'required'
        ]);

        Hour::create([
            'absen_dibuka' => request('absen_dibuka'),
            'absen_ditutup' => request('absen_ditutup'),
            'level' => request('level'),
            // 'level' => 'guru',
        ]);

        return back()->with('success', 'Data jam absen guru berhasil ditambahkan!');
    }

    public function editGuru(Hour $hour){
        return view('admin/hour/hour-edit', [
            'hour' => $hour,
            'submit' => 'Update',
            'level' => 'guru'
        ]);
    }

    public function editSiswa(Hour $hour){
        return view('admin/hour/hour-edit', [
            'hour' => $hour,
            'submit' => 'Update',
            'level' => 'siswa'
        ]);
    }

    public function update(Hour $hour){
        request()->validate([
            'absen_dibuka' => 'required',
            'absen_ditutup' => 'required'
        ]);

        $hour->update([
            'absen_dibuka' => request('absen_dibuka'),
            'absen_ditutup' => request('absen_ditutup'),
            'level' => request('level'),
        ]);

        return back()->with('success', 'Data jam absen guru berhasil diubah!');
    }

    public function destroy(Hour $hour)
    {
        $hour->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
