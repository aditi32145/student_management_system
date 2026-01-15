<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required',
            'password' => 'required'
        ]);

        $email    = $request->email;
        $password = $request->password;

        /* ================= STUDENT CHECK ================= */
        $student = Student::where('email', $email)->first();

        if ($student && Hash::check($password, $student->password)) {

            Session::put('user_type', 'student');
            Session::put('student_id', $student->id);

            return redirect()->route('student.dashboard');
        }

        /* ================= TEACHER CHECK ================= */
        $teacher = Teacher::where('email', $email)->first();

        if ($teacher && Hash::check($password, $teacher->password)) {

            Session::put('user_type', 'teacher');
            Session::put('teacher_id', $teacher->id);

            return redirect()->route('teacher.dashboard');
        }

        /* ================= FAILED ================= */
        return back()->with('error', 'Invalid login credentials');
    }
}
