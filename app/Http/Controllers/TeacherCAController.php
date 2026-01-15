<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\CAUpload;
use App\Models\Notification;
use App\Models\StudentCASubmission;
use Illuminate\Support\Facades\Storage;




class TeacherCAController extends Controller
{
   public function index()
{
    $teacherId = session('user_id');


    // teacher's CA uploads only
    $uploads = CAUpload::where('teacher_id', $teacherId)
                ->latest()
                ->get();


    // get CA IDs of this teacher
    $caIds = $uploads->pluck('id');

    // student submissions only for those CA
    $submissions = StudentCASubmission::whereIn('ca_upload_id', $caIds)
                    ->latest()
                    ->get();


    return view('teacher.ca_upload', compact('uploads', 'submissions'));
}

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'course' => 'required',
            'ca_type' => 'required',
            'upload_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);


        $data = $request->all();
        $data['teacher_id'] = session('user_id');


        if ($request->upload_type == 'pdf') {
            $file = $request->file('pdf_file');
            $path = $file->store('ca_pdfs', 'public');
            $data['pdf_file'] = $path;
        }


        CAUpload::create($data);


        return back()->with('success', 'CA Uploaded Successfully');
    }


    public function notify($id)
    {
        $ca = CAUpload::findOrFail($id);


        $teacherName = session('user_name');


        $message = "$teacherName uploaded $ca->ca_type. Submit your CA between $ca->start_date and $ca->end_date.";


        Notification::create([
            'teacher_id' => session('user_id'),
            'message' => $message
        ]);


        return back()->with('success','Notification Sent');
    }


    public function edit($id)
{
    $ca = CAUpload::findOrFail($id);
    return response()->json($ca);
}


public function update(Request $request, $id)
{
    $ca = CAUpload::findOrFail($id);


    $data = $request->all();


    if ($request->upload_type == 'pdf' && $request->hasFile('pdf_file')) {
        $file = $request->file('pdf_file');
        $path = $file->store('ca_pdfs', 'public');
        $data['pdf_file'] = $path;
        $data['text_content'] = null; // clear old text
    }


    if ($request->upload_type == 'text') {
        $data['pdf_file'] = null; // clear old pdf
    }


    $ca->update($data);


    return back()->with('success', 'CA Updated Successfully');
}


    public function destroy($id)
    {
        CAUpload::findOrFail($id)->delete();
        return back()->with('success','CA Deleted');
    }


    public function updateSubmissionStatus(Request $request, $id)
{
    $sub = StudentCASubmission::findOrFail($id);
    $sub->status = $request->status;
    $sub->save();

    return back()->with('success','Status updated');
}


public function deleteSubmission($id)
{
    $sub = StudentCASubmission::findOrFail($id);

    if($sub->pdf_file){
        Storage::delete('public/'.$sub->pdf_file);
    }

    $sub->delete();

    return back()->with('success','Submission deleted');
}


}
