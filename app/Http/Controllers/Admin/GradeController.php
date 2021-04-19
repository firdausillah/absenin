<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\{Grade};
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GradeController extends Controller
{
    public function __invoke(){
        return view('admin/grade/index', [
            'grades' => Grade::get(),
        ]);
    }

    public function create(){
        return view('admin/grade/create', [
            'grade' => new Grade,
            'submit' => 'Create'
        ]);
    }

    public function save(){
        request()->validate([
            'kode_kelas' => 'required|unique:Grades',
            'nama_kelas' => 'required|unique:Grades'
        ]);

        Grade::create([
            'kode_kelas' => request('kode_kelas'),
            'nama_kelas' => request('nama_kelas'),
            'slug' => Str::slug(request('nama_kelas')),
        ]);

        return redirect()->route('admin.grade')->with('success', 'Kelas berhasil ditambahkan');
    }

    public function edit(Grade $grade)
    {
        return view('admin/grade/edit', [
            'grade' => $grade,
            'submit' => 'Update'
        ]);
    }

    public function update(Grade $grade)
    {
        request()->validate([
            'kode_kelas' => 'required|unique:Grades,kode_kelas,' . $grade->id,
            'nama_kelas' => 'required|unique:Grades,nama_kelas,' . $grade->id
        ]);

        $grade->update([
            'kode_kelas' => request('kode_kelas'),
            'nama_kelas' => request('nama_kelas'),
            'slug' => Str::slug(request('nama_kelas')),
        ]);

        return redirect()->route('admin.grade')->with('success', 'Kelas berhasil diupdated!');
    }

    public function destroy(Grade $grade){
        $grade->delete();
        return back()->with('success', $grade->nama_kelas . ' Berhasil Dihapus!');
    }
}
