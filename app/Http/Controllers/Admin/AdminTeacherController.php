<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;


class AdminTeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = Teacher::query();

        // 🔍 Name or Email search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }


        // 🎭 Role filter
        if ($request->role) {
            $query->where('role', $request->role);
        }


        // 📅 DOB date range filter
        if ($request->start_date) {
            $query->whereDate('dob', '>=', $request->start_date);
        }


        if ($request->end_date) {
            $query->whereDate('dob', '<=', $request->end_date);
        }


        $teachers = $query->orderBy('name')->get();


        return view('admin.teachers.index', compact('teachers'));
    }


    public function export(Request $request)
{
    $query = Teacher::query();


    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }


    if ($request->role) {
        $query->where('role', $request->role);
    }


    if ($request->start_date) {
        $query->whereDate('dob', '>=', $request->start_date);
    }


    if ($request->end_date) {
        $query->whereDate('dob', '<=', $request->end_date);
    }


    $teachers = $query->orderBy('name')->get();


    // CSV filename
    $fileName = 'teachers_export.csv';


    // Create CSV in memory
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$fileName\"",
    ];


    $columns = ['ID', 'Name', 'Role', 'Subject', 'Email', 'DOB'];


    $callback = function () use ($teachers, $columns) {
        $file = fopen('php://output', 'w');


        // headings
        fputcsv($file, $columns);


        // rows
        foreach ($teachers as $t) {
            fputcsv($file, [
                $t->id,
                $t->name,
                $t->role,
                $t->subject,
                $t->email,
                $t->dob,
            ]);
        }


        fclose($file);
    };


    return response()->stream($callback, 200, $headers);
}


}
