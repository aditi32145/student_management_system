<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\CAUpload;
use App\Models\StudentCASubmission;
use Carbon\Carbon;

class StudentCAController extends Controller
{
    public function index()
    {
        // logged in student id stored in session
        $studentId = session('user_id');

        // get student details
        $student = Student::findOrFail($studentId);

        // match degree with course field
        $ca_list = CAUpload::where('course', strtoupper($student->degree))
            ->orderBy('created_at', 'desc')
            ->get();


        return view('students.ca_activity', compact('student', 'ca_list'));
    }

    public function submit(Request $request, $id)
{
    $studentId = session('user_id');
    $ca = CAUpload::findOrFail($id);

    $today = Carbon::today();

    // date validation
    if ($today->lt(Carbon::parse($ca->start_date)) ||
        $today->gt(Carbon::parse($ca->end_date))) {
        return back()->with('error','Submission allowed only between given dates.');
    }

    // find existing submission
    $submission = StudentCASubmission::where('student_id',$studentId)
                    ->where('ca_upload_id',$id)->first();

    // if already accepted -> lock
    if ($submission && $submission->status === 'accepted') {
        return back()->with('error','Already accepted. You cannot change.');
    }

    // if editable is no and already uploaded -> lock
    if ($submission && !$ca->editable) {
        return back()->with('error','Re-upload not allowed for this CA.');
    }

    $request->validate([
        'pdf_file' => 'required|mimes:pdf|max:5120'
    ]);

    $path = $request->file('pdf_file')->store('student_ca','public');

    if (!$submission) {
        StudentCASubmission::create([
            'student_id' => $studentId,
            'ca_upload_id' => $id,
            'pdf_file' => $path,
            'uploaded_at' => now(),
            'status' => 'pending'
        ]);
    } else {
        $submission->update([
            'pdf_file' => $path,
            'uploaded_at' => now(),
            'status' => 'pending'
        ]);
    }

    return back()->with('success','CA submitted successfully.');
}

}
