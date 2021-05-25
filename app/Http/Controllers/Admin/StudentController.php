<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Student};
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('admin/student/index', [
            'students' => User::leftjoin('students', 'students.user_id', '=', 'users.id')
            ->where('role', 'siswa')
            ->get()
        ]);
    }

    public function edit($user){
        // dd($user);
        return view('admin/student/edit', [
            'student' => User::leftjoin('students', 'students.user_id', '=', 'users.id')
                ->Where('users.username', $user)
                ->first()
        ]);
    }

    public function update(User $student){
        // dd($student);
        $student = User::where('id', $student->id)->first();
        request()->validate([
            'name' => 'required',
            'username' => 'required|unique:Users,username,' . $student->id,
            'induk' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'gambar' => request('image') ? 'image|mimes:jpeg,png,jpg|max:2048' : '',
        ]);
        dd(request());

        $student_by_id = Student::where('user_id', $student->id)->first();
        $students_user_id = Student::select('user_id')->where('user_id', $student->id)->first();
        // dd($student_by_id);
        if ($students_user_id == null) {
            Student::create([
                'user_id' => $student->id,
                'induk' => request('induk'),
                'mapel' => request('mapel'),
                'no_hp' => request('no_hp'),
                'alamat' => request('alamat'),
                'gambar' => request('gambar') ? request()->file('image')->store('images/teachers') : 'null',
            ]);

            return redirect()->route('admin.data.guru')->with('success', 'Data Guru Berhasil diupdate');
        } else {
            $student->update([
                'name' => request('name'),
                'username' => request('username'),
            ]);
            // dd(new $student);

            if (request('gambar')) {
                Storage::delete($student_by_id->gambar);
                $image = request()->file('gambar')->store('images/teachers');
            } elseif ($student_by_id->gambar) {
                $image = $student_by_id->gambar;
            } else {
                $image = null;
            }

            $student_by_id->update([
                'user_id' => $student->id,
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
