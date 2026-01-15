<?php
namespace App\Http\Controllers;

use App\Models\Student;

class AdminStudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();
        return view('admin.students.index', compact('students'));
    }
}

