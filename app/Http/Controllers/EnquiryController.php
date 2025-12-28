<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;


class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|max:150',
            'phone'      => 'required|string|max:20',
            'country'    => 'required|string',
            'address'    => 'required|string|max:255',
            'state'      => 'required|string|max:100',
            'enquiry'    => 'required|string',
        ]);


        // Store in database (stmn table)
        Enquiry::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'country'    => 'India',
            'address'    => $request->address,
            'state'      => $request->state,
            'enquiry'    => $request->enquiry,
        ]);


        // Redirect with success message
        return back()->with('success', 'Your enquiry has been submitted successfully.');
    }

    public function newsletter(){
        $enquiries = Enquiry::orderBy('id','desc')->get();
        return view('admin.newsletter', compact('enquiries'));
    }
}
