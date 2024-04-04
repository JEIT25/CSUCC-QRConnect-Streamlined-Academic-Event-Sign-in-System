<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('attendees.create');
    }

    public function validate(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validating data recieved
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'occupational_status' => 'required|string|max:255',
            'school_name' => 'nullable|string|max:255',
            'employer' => 'nullable|string|max:255',
            'email' => 'required|string|email|unique:users,email|max:255',
            'valid_id' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);



        // Save validated data
        $attendee = new Attendee();
        $attendee->fname = $validatedData['fname'];
        $attendee->lname = $validatedData['lname'];
        $attendee->country = $validatedData['country'];
        $attendee->occupational_status = $validatedData['occupational_status'];
        $attendee->school_name = $validatedData['school_name'];
        $attendee->employer = $validatedData['employer'];
        $attendee->email = $validatedData['email'];

        // Handle file upload
        if ($request->hasFile('valid_id')) {
            $file = $request->file('valid_id');

            // Check if the file is valid
            if ($file->isValid()) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('attendee_ids', $fileName);

                // Save file path in the database
                $attendee->valid_id = $filePath;
            } else {
                return "Invalid file.";
            }
        }

        // Save the user
        $attendee->save();

        return redirect()->route("attendees.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
