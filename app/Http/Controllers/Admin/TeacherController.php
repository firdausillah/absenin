<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('admin/teacher/index', [
            'teachers' => User::leftjoin('teachers', 'teachers.user_id', '=', 'users.id')
                ->where('role', 'guru')
                ->get()
        ]);
    }

    public function edit($teacher){
        // dd($teacher);
        return view('admin/teacher/edit', [
            'teacher' =>User::leftjoin('teachers', 'teachers.user_id', '=', 'users.id')
            ->Where('users.username', $teacher)
            ->first()
        ]);
    }
    public function detail($teacher){
        // dd($teacher);
        return view('admin/teacher/detail', [
            'teacher' =>User::leftjoin('teachers', 'teachers.user_id', '=', 'users.id')
            ->leftjoin('homerooms', 'homerooms.user_id', '=', 'users.id')
            ->leftjoin('grades', 'grades.id', '=', 'homerooms.grade_id')
            ->Where('users.username', $teacher)
            ->first()
        ]);
    }

    public function update(User $teacher){
        $user = User::where('id', $teacher->id)->first();
        request()->validate([
            'name' => 'required',
            'username' => 'required|unique:Users,username,' . $user->id,
            'induk' => 'required',
            'mapel' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'gambar' => request('image') ? 'image|mimes:jpeg,png,jpg|max:2048' : '',
        ]);

        $teacher_by_id = Teacher::where('user_id', $teacher->id)->first();
        $teachers_user_id = Teacher::select('user_id')->where('user_id', $teacher->id)->first();
        // dd($teacher_by_id);
        if($teachers_user_id == null){
            Teacher::create([
                'user_id' => $teacher->id,
                'induk' => request('induk'),
                'mapel' => request('mapel'),
                'no_hp' => request('no_hp'),
                'alamat' => request('alamat'),
                'gambar' => request('gambar') ? request()->file('image')->store('images/teachers') : 'null',
            ]);

            return redirect()->route('admin.data.guru')->with('success', 'Data Guru Berhasil diupdate');
        } else{
            $user->update([
                'name' => request('name'),
                'username' => request('username'),
            ]);
            // dd(new $user);

            if (request('gambar')) {
                Storage::delete($teacher_by_id->gambar);
                $image = request()->file('gambar')->store('images/teachers');
            } elseif ($teacher_by_id->gambar) {
                $image = $teacher_by_id->gambar;
            } else {
                $image = null;
            }

            $teacher_by_id->update([
                'user_id' => $teacher->id,
                'induk' => request('induk'),
                'mapel' => request('mapel'),
                'no_hp' => request('no_hp'),
                'alamat' => request('alamat'),
                'gambar' => $image,
            ]);

            return redirect()->route('admin.data.guru')->with('success', 'Data Guru Berhasil diupdate');
        }
    }
}
