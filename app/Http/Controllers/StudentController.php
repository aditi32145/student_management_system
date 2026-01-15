<?php


namespace App\Http\Controllers;


use App\Models\Notification;


class StudentController extends Controller
{
    public function notifications()
    {
        $notifications = Notification::latest()->get();


        return response()->json([
            'count' => $notifications->count(),
            'notifications' => $notifications
        ]);
    }
}
