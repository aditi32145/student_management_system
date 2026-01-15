<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCredentialMail;

class StudentImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        $file = fopen($request->file('csv_file'), 'r');
        fgetcsv($file); // skip header

        $inserted = 0;
        $skipped  = 0;

        while (($row = fgetcsv($file)) !== false) {

            if (count($row) < 7) {
                $skipped++;
                continue;
            }

            [$roll, $name, $degree, $phone, $dob, $email, $start] = $row;

            // Mandatory check
            if (!$roll || !$name || !$degree || !$dob || !$email) {
                $skipped++;
                continue;
            }

            // Degree validation
            $degree = strtolower(trim($degree));
            if (!in_array($degree, ['bca', 'bba'])) {
                $skipped++;
                continue;
            }

            // Email validation
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $skipped++;
                continue;
            }

            try {
                $dobDate   = Carbon::parse($dob);
                $startDate= Carbon::parse($start);
            } catch (\Exception $e) {
                $skipped++;
                continue;
            }

            // Minimum age 18
            if ($dobDate->age < 18) {
                $skipped++;
                continue;
            }

            // End date = Start + 4 years
            $endDate = $startDate->copy()->addYears(4);

            // Password = DOB (ddmmyyyy)
            $plainPassword = $dobDate->format('dmY');
            $existingStudent = Student::where('roll_no', $roll)->first();
            $oldEmail = $existingStudent?->email;

           $Student =  Student::updateOrCreate(
                ['roll_no' => $roll],   // ✅ UNIQUE KEY
                [
                    'name'       => $name,
                    'degree'     => $degree,
                    'phone'      => $phone,
                    'dob'        => $dobDate,
                    'email'      => $email,
                    'password'   => Hash::make($plainPassword),
                    'start_date' => $startDate,
                    'end_date'   => $endDate,
                ]
            );
            $ShouldSendMail = $Student->wasRecentlyCreated||($oldEmail && $oldEmail !== $email);
            if($ShouldSendMail){
            Mail::to($email)->Send(
                new UserCredentialMail(
                    $name,
                    $email,
                    $plainPassword,
                    'Student'
                )
                );
            }
 
            $inserted++;
        }

        fclose($file);

        return back()->with(
            'success',
            "Students Imported: $inserted | Skipped: $skipped"
        );
    }
}
