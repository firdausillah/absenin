<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Semester;

class SemesterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('admin/semester/index', [
            'semesters' => Semester::get()
        ]);
    }

    public function create(){
        return view('admin/semester/create', [
            'semester' => New Semester,
            'submit' => 'Create'
        ]);
    }

    public function save(){
        request()->validate([
            'tahun_pelajaran' => 'required',
            'semester' => 'required'
        ]);

        Semester::create([
            'tahun_pelajaran' => request('tahun_pelajaran'),
            'semester' => request('semester'),
        ]);

        return redirect()->route('admin.semester')->with('success', 'Semester berhasil ditambahkan');
    }

    public function edit(Semester $semester)
    {
        return view('admin/semester/edit', [
            'semester' => $semester,
            'submit' => 'Update'
        ]);
    }

    public function update(Semester $semester){
        request()->validate([
            'tahun_pelajaran' => 'required',
            'semester' => 'required'
        ]);

        $semester->update([
            'tahun_pelajaran' => request('tahun_pelajaran'),
            'semester' => request('semester'),
        ]);

        return redirect()->route('admin.semester')->with('success', 'Semester berhasil diupdate');
    }

    public function destroy(Semester $semester){
        $semester->delete();
        return back()->with('success', 'Data Semester berhasil dihapus!');
    }
}
