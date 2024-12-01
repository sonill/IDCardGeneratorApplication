<?php

namespace App\Http\Controllers;
use App\Models\IDCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenerateIDController extends Controller
{
    public function store(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'dob' => 'required|date',
        'expiry_date' => 'required|date|after:today',
        'contact_number' => 'required|string|max:15',
        'email' => 'required|email|max:255',
    ]);
  


    // Handle the file upload
    if ($request->hasFile('photo')) {
        // Store the file in the 'photos' directory under 'storage/app/public'
        $path = $request->file('photo')->store('photos', 'public');
        $validated['photo'] = $path; // Store the photo path in the validated data
    }

    // Save the data to the database
    IDCard::create($validated); // Ensure the 'name' field is included in the $validated array

    // Redirect or return response
    return redirect()->route('ViewID')->with('success', 'ID Card created successfully!');
}  
   
            public function updateStudent(Request $request)
        {
            // dd($request->all());
            $validated = $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'dob' => 'required|date',
                'expiry_date' => 'required|date|after:today',
                'contact_number' => 'required|string|max:15',
                'email' => 'required|email|max:255',
            ]);
           
            // Handle file upload
            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('public/photos');
                $validated['photo'] = $path;
            }

            // Save ID data to the database
            $data=IDCard::create($validated);
            if($data)
            {
                return redirect()->route('ViewID')->with('success', 'ID Card update successfully!');
            }

        }

       
}
