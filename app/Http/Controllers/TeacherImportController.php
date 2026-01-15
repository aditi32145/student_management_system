<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCredentialMail;

class TeacherImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        $file = fopen($request->file('csv_file'), 'r');
        fgetcsv($file); // skip header

        $inserted = 0;
        $skipped = 0;

        while (($row = fgetcsv($file)) !== false) {

            if (count($row) < 5) {
                $skipped++;
                continue;
            }

            [$name, $role, $subject, $email, $dob] = $row;

            // Mandatory check
            if (!$name || !$role || !$subject || !$email || !$dob) {
                $skipped++;
                continue;
            }

            // Role validation
            $role = strtolower(trim($role));
            if (!in_array($role, ['hod', 'part_time', 'full_time'])) {
                $skipped++;
                continue;
            }

            try {
                $dobDate = Carbon::parse($dob);
            } catch (\Exception $e) {
                $skipped++;
                continue;
            }

            // Password logic
            $cleanName = strtolower(str_replace(' ', '', $name)); //Aditi Majumder = aditimajumder
            $namePart = substr($cleanName, 0, 8); //aditimaj
            $dobPart  = $dobDate->format('Ymd'); //20001012
            $plainPassword = $namePart . $dobPart; //aditimaj20001012
            $existingTeacher = Teacher::where('email', $email)->first();
            $oldEmail = $existingTeacher?->email;

            $teacher = Teacher::updateOrCreate(
                ['email' => $email],
                [
                    'name'     => $name,
                    'role'     => $role,
                    'subject'  => $subject,
                    'dob'      => $dobDate,
                    'password' => Hash::make($plainPassword),
                ]
            );
 $ShouldSendMail = $teacher->wasRecentlyCreated||($oldEmail && $oldEmail !== $email);
            if($ShouldSendMail){
             Mail::to($email)->Send(
                new UserCredentialMail(
                    $name,
                    $email,
                    $plainPassword,
                    'Teacher'
                )
                );
            }
 
            $inserted++;
        }

        fclose($file);

        return back()->with(
            'success',
            "Teachers Imported: $inserted | Skipped: $skipped"
        );
    }
}
