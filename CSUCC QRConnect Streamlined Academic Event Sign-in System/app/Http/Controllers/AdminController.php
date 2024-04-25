<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException; //for handling validatione exception
use Illuminate\Database\UniqueConstraintViolationException;
use App\Models\User;
use thiagoalessio\TesseractOCR\TesseractOCR; // orcr text extraction from image
use Illuminate\Support\Str;
use thiagoalessio\TesseractOCR\UnsuccessfulCommandException;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.signup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //all form data converted to lowercase
        foreach ($request->all() as $key => $value) {
            // Lowercase the value only if it's a string
            if (is_string($value)) {
                $request->merge([$key => strtolower($value)]);
            }
        }

        //validating data recieved
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|max:255|confirmed',
                'password_confirmation' => 'required',
                'valid_school_id' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Validation passed, continue to create new admin

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors()->messages())->withInput();
        }

        // Save validated data
        $new_admin = new User();
        $new_admin->fname = $validatedData['fname'];
        $new_admin->lname = $validatedData['lname'];
        $new_admin->email = $validatedData['email'];
        $new_admin->password = $validatedData['password'];
        $new_admin->valid_school_id = $validatedData['valid_school_id'];

        // Handle valid_school_id file upload and validation
        if ($request->hasFile('valid_school_id')) {
            $file = $request->file('valid_school_id');

            // Check if the file is valid
            if ($file->isValid()) {
                $fileName = $file->getClientOriginalName();

                try {
                    // Create an instance of TesseractOCR and set the image path
                    $ocr = new TesseractOCR($file);

                    // Perform OCR and get the text result
                    $text = $ocr->run();
                    //! dd($text); TEST ID PICTURE WITH HIGH LIGHT PICTURE IF WHAT IS THE TEXT RESULT
                } catch (UnsuccessfulCommandException $e) {
                    // Handle the unsuccessful command exception
                    return redirect()->route('admins.signup')->with('invalid_id', 'School ID validation failed, unclear/credentials does not match/invalid ID!')->withInput();
                }

                // Check if the OCR text contains both the first name and last name, and school name
                if (
                    Str::contains(strtolower($text), strtolower($request->input('fname'))) ||
                    Str::contains(strtolower($text), strtolower($request->input('lname'))) ||
                    Str::contains(strtolower($text), strtolower("Caraga State University Cabadbaran Campus")) ||
                    Str::contains(strtolower($text), strtolower("CSUCC")) ||
                    Str::contains(strtolower($text), strtolower("csuce carsyu edu ph")) ||
                    Str::contains(strtolower($text), strtolower("Cabadbaran Campus"))
                ) {
                    // Both first name , last name, school name are found in the OCR text
                    $filePath = $file->storeAs('admin_ids', $fileName);

                    // set file path as admin valid_school_id attribute
                    $new_admin->valid_school_id = $filePath;

                    // Proceed with other operations (e.g., saving admin data)
                } else {
                    // Either first name or last name is not found in the OCR text
                    // Redirect back to the register route
                    return redirect()->route('admins.signup')->with('invalid_id', 'School ID validation failed, unclear/credentials does not match/invalid ID!')->withInput();
                }
            } else {
                return redirect()->route('admins.signup')->with('invalid_id', 'Valid ID validation failed, ID format not accepted')->withInput();
            }

            //handle saveing new admin acc to database
            try {
                $new_admin->save();
            } catch (UniqueConstraintViolationException $e) { //handle email unique constraint
                $errorMessage = 'This email has already been taken.';
                return redirect()->back()->withErrors(['email' => $errorMessage])->withInput();
            }
            return redirect()->route('home');
        }
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
