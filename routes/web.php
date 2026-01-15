<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\Admin\EventController;
use App\Models\Event;
use App\Http\Controllers\StudentImportController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\TeacherImportController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\TeacherCAController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCAController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminTeacherController;


Route::get('/', function () {
    $events = Event::latest()->take(3)->get();
    return view('home', compact('events'));
});

// LOGIN PAGE
Route::get('/login', function () {
    return view('login');
})->name('login');


// REGISTER PAGE
Route::get('/register', function () {
    return view('register');
})->name('register');


// // ADMIN DASHBOARD
// Route::get('/admin/dashboard', function () {
//     return view('dashboards.admin');
// })->name('admin.dashboard');

// STUDENT DASHBOARD
Route::get('/student/dashboard', function () {
    return view('dashboards.student');
})->name('student.dashboard');

// TEACHER DASHBOARD
Route::get('/teacher/dashboard', function () {
    return view('dashboards.teacher');
})->name('teacher.dashboard');

Route::post('/login-check', function (Request $request) {

    $email = $request->email;
    $password = $request->password;

    // --- ADMIN CHECK ---
    if ($email === 'admin@gmail.com' && $password === '1234') {
        return redirect()->route('admin.dashboard');
    }

    // --- STUDENT CHECK ---
    $student = DB::table('students')
        ->where('email', $email)
        ->first();

    if ($student && Hash::check($password, $student->password)) {
        session([
            'user_role' => 'student',
            'user_id' => $student -> id,
            'user_name' => $student -> name,
        ]);
        return redirect()->route('student.dashboard');
    }

    // --- TEACHER CHECK ---
    $teacher = DB::table('teachers')
        ->where('email', $email)
        ->first();

  if ($teacher && Hash::check($password, $teacher->password)) {
    session([
        'user_role'     => 'teacher',          // main role
        'teacher_role'  => strtoupper($teacher->role),     // FULL_TIME / PART_TIME / HOD
        'user_id'       => $teacher->id,
        'user_name'     => $teacher->name,
    ]);    

    return redirect()->route('teacher.dashboard');
}


    // --- INVALID LOGIN ---
    return back()->with('error', 'Invalid login details');
})->name('login.check');

Route::post('/enquiry-store', [EnquiryController::class,'store'])
-> name('enquiry.store');

Route::get('/admin/newsletter', [EnquiryController::class,'newsletter'])
-> name('admin.newsletter');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboards.admin');
    })->name('dashboard');

    Route::resource('events', EventController::class);

    Route::post('/students/import', [StudentImportController::class, 'import'])
    ->name('students.import');

    Route::get('/students', function(){
        $students=\App\Models\Student::latest()->get();
        return view('admin.students.index', compact('students'));
    })->name('students.index');

    Route::get('/teachers', function () {
        $teachers = \App\Models\Teacher::latest()->get();
        return view('admin.teachers.index', compact('teachers'));
    })->name('teachers.index');

    Route::post('/teachers/import', [TeacherImportController::class, 'import'])
        ->name('teachers.import');
});

Route::get('/teacher/ca-upload', [TeacherCAController::class,'index'])->name('teacher.ca.index');
Route::post('/teacher/ca-upload/store', [TeacherCAController::class,'store'])->name('teacher.ca.store');
Route::post('/teacher/ca-upload/notify/{id}', [TeacherCAController::class,'notify'])->name('teacher.ca.notify');
Route::delete('/teacher/ca-upload/delete/{id}', [TeacherCAController::class,'destroy'])->name('teacher.ca.delete');
Route::get('/teacher/ca-upload/{id}/edit', [TeacherCAController::class,'edit'])->name('teacher.ca.edit');
Route::post('/teacher/ca-upload/{id}/update', [TeacherCAController::class,'update'])->name('teacher.ca.update');

Route::get('/student/notifications', [StudentController::class, 'notifications']);

Route::get('/student/ca-activity', [StudentCAController::class, 'index'])
    ->name('student.ca.activity');

    Route::post('/student/ca/submit/{id}', [StudentCAController::class,'submit'])
    ->name('student.ca.submit');

 Route::post('/teacher/submission-status/{id}',
    [TeacherCAController::class,'updateSubmissionStatus'])
    ->name('teacher.submission.status');


Route::delete('/teacher/submission-delete/{id}',
    [TeacherCAController::class,'deleteSubmission'])
    ->name('teacher.submission.delete');

    Route::get('/admin/dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');

    Route::get('/admin/teachers', [AdminTeacherController::class, 'index'])->name('admin.teachers.index');
Route::get('/admin/teachers/export', [AdminTeacherController::class, 'export'])->name('admin.teachers.export');
