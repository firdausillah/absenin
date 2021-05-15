<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
}
