<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\{Homeroom, Teacher, Grade, Semester, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeroomController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $semester = Semester::orderBy('id', 'DESC')->first();

        return view('admin/homeroom/index', [
            'homerooms' => Homeroom::select('homerooms.id as id', 'users.name as nama', 'grades.nama_kelas as kelas')->
            join('users', 'homerooms.user_id', '=', 'users.id')
            ->join('teachers', 'users.id', '=', 'teachers.user_id')
            ->join('semesters', 'homerooms.semester_id', '=', 'semesters.id')
            ->join('grades', 'homerooms.grade_id', '=', 'grades.id')
            ->where('semesters.id', $semester->id)
            ->get(),
            'smst' => $semester,
            'smstrs' => Semester::get()
        ]);
    }

    public function search(Request $request)
    {
        // dd($request->semester_id);
        return view('admin/homeroom/index', [
            'homerooms' =>Homeroom::select('homerooms.id as id', 'users.name as nama', 'grades.nama_kelas as kelas')->
            join('users', 'homerooms.user_id', '=', 'users.id')
            ->join('teachers', 'users.id', '=', 'teachers.user_id')
            ->join('semesters', 'homerooms.semester_id', '=', 'semesters.id')
            ->join('grades', 'homerooms.grade_id', '=', 'grades.id')
            ->where('semesters.id', $request->semester_id)
            ->get(),
            'smst' => Semester::where('id', $request->semester_id)->first(),
            'smstrs' => Semester::get(),
        ]);
    }

    public function create(){
        $semester = Semester::orderBy('id', 'DESC')->first();
        return view('admin/homeroom/create', [
            'homeroom' => new homeroom,
            'semester' => $semester,
            'teachers' => User::leftjoin('teachers', 'users.id', '=', 'teachers.user_id')->where('role', 'guru')->get(),
            'users' => User::where('role', 'guru')->get(),
            'grades' => Grade::get(),
            'submit' => 'create'
        ]);
    }

    public function save(Homeroom $homeroom){
        request()->validate([
            'semester_id' => 'required',
            'grade_id' => 'required',
            'user_id' => 'required',
        ]);
        // dd(request());

        Homeroom::create([
            'semester_id' => request('semester_id'),
            'grade_id' => request('grade_id'),
            'user_id' => request('user_id'),
        ]);

        return redirect()->route('admin.data.homeroom')->with('success', 'Wali Kelas berhasil dibuat');
    }

    public function edit(Homeroom $homeroom)
    {
        // dd(Teacher::leftjoin('users', 'teachers.user_id', '=', 'users.id')->get());
        return view('admin/homeroom/edit', [
            'homeroom' => $homeroom,
            'semesters' => Semester::get(),
            'teachers' => User::leftjoin('teachers', 'users.id', '=', 'teachers.user_id')->where('role', 'guru')->get(),
            'users' => User::where('role', 'guru')->get(),
            'grades' => Grade::get(),
            'submit' => 'update'
        ]);
    }

    public function update(Homeroom $homeroom){
        request()->validate([
            'semester_id' => 'required',
            'grade_id' => 'required',
            'user_id' => 'required',
        ]);
        // dd(request('user_id'));

        $homeroom->update([
            'semester_id' => request('semester_id'),
            'grade_id' => request('grade_id'),
            'user_id' => request('user_id'),
        ]);

        return redirect()->route('admin.data.homeroom')->with('success', 'Wali Kelas berhasil diupdate');
    }

    public function destroy(Homeroom $homeroom)
    {
        $homeroom->delete();
        return back()->with('success',  'Data Berhasil Dihapus!');
    }
}
