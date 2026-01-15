<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Event;


class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalTeachers   = Teacher::count();
        $totalStudents   = Student::count();
        $totalEvents     = Event::count();

        return view('dashboards.admin', compact(
            'totalTeachers',
            'totalStudents',
            'totalEvents',
        ));
    }
}
