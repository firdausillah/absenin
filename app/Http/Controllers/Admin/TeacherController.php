<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Teacher;
use Illuminate\Support\Facades\Crypt;

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
            'teachers' => Teacher::join('users', 'users.id', '=', 'teachers.user_id')
                                    ->join('homerooms', 'homerooms.teacher_id', '=', 'teachers.id')
                                    ->leftjoin('grades', 'grades.id', '=', 'homerooms.grade_id')
                                    ->get()
        ]);
    }

    public function edit($teacher){
        // dd($teacher);
        return view('admin/teacher/edit', [
            'teacher' => Teacher::join('users', 'users.id', '=', 'teachers.user_id')
                ->join('homerooms', 'homerooms.teacher_id', '=', 'teachers.id')
                ->Where('users.username', $teacher)
                ->first()
        ]);
    }
}
