<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\Admin\EventController;
use App\Models\Event;


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

Route::post('/login-check', function (\Illuminate\Http\Request $request) {
    $email = $request->email;
    $password = $request->password;
    if ($email === 'admin@gmail.com' && $password === '1234') {
        return redirect()->route('admin.dashboard');
    }
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
});
