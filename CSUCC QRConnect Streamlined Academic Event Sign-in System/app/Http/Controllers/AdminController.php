<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException; //for handling validatione exception
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

    public function show()
    {
        $user = auth()->user();

        // Pass the user data to the view
        return view('admins.show', ['admin' => $user]);
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
                'valid_school_id_front' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'valid_school_id_back' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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
        $new_admin->valid_school_id_front = $validatedData['valid_school_id_front'];
        $new_admin->valid_school_id_back = $validatedData['valid_school_id_back'];

        // Handle valid_school_id files front and back upload and validation
        if ($request->hasFile('valid_school_id_front') && $request->hasFile('valid_school_id_back')) {
            $file1 = $request->file('valid_school_id_front');
            $file2 = $request->file('valid_school_id_back');

            // Check if the image file2 arevalid
            if ($file1->isValid() && $file2->isValid()) {
                $fileName1 = $file1->getClientOriginalName();
                $fileName2 = $file2->getClientOriginalName();

                try {
                    $ocr1 = new TesseractOCR($file1);
                    $ocr2 = new TesseractOCR($file2);

                    // Set language (optional, but can improve accuracy for specific languages)
                    $ocr1->lang('eng'); // Set language to English
                    $ocr2->lang('eng'); // Set language to English


                    // Perform OCR and get the text result
                    $textFront = $ocr1->run();
                    $textBack = $ocr2->run();

                    //! dd($text); TEST ID PICTURE WITH HIGH LIGHT PICTURE IF WHAT IS THE TEXT RESULT
                } catch (UnsuccessfulCommandException $e) {
                    // Handle the unsuccessful command exception
                    return redirect()->back()->with('valid_school_id', 'Invalid School ID!')->withInput();
                }

                // Check if the Front ID text contains both the first name and last name
                if (
                    Str::contains(strtolower($textFront), strtolower($request->input('fname'))) &&
                    Str::contains(strtolower($textFront), strtolower($request->input('lname'))) ||
                    Str::contains(strtolower($textFront), strtolower("Caraga State University Cabadbaran Campus")) ||
                    Str::contains(strtolower($textFront), strtolower("CSUCC")) ||
                    Str::contains(strtolower($textFront), strtolower("csucc carsu edu ph"))
                ) {
                    // Both first name , last name, school name are found in the OCR text
                    $filePath1 = $file1->storeAs('admin_ids', $fileName1);

                    // set file path for front id as admin valid_school_id_front attribute
                    $new_admin->valid_school_id_front = $filePath1;

                    // Proceed with other operations (e.g., saving admin data)
                } else {
                    // Either first name or last name is not found in the Front ID text
                    // Redirect back to the register route
                    return redirect()->back()->with('valid_school_id_front', 'School ID validation failed,unclear/credentials does not match!')->withInput();
                }
            } else {
                return redirect()->back()->with('valid_school_id_front', 'Valid ID validation failed, ID format not accepted')->withInput();
            }


            // Check if the Back Text of ID contains  school name
            if (
                Str::contains(strtolower($textBack), strtolower("Caraga State University Cabadbaran Campus")) ||
                Str::contains(strtolower($textBack), strtolower("CSUCC")) ||
                Str::contains(strtolower($textBack), strtolower("csuce carsu edu ph")) ||
                Str::contains(strtolower($textBack), strtolower("Cabadbaran Campus"))
            ) {
                // School Name is Found
                $filePath2 = $file2->storeAs('admin_ids', $fileName2);

                // set file path for back id as admin valid_school_id_back attribute
                $new_admin->valid_school_id_back = $filePath2;

                // Proceed with other operations (e.g., saving admin data)
            } else {
                // School Name not found in Back ID text
                // Redirect back to the register route
                return redirect()->back()->with('valid_school_id_back', 'School ID validation failed,unclear/credentials does not match!')->withInput();
            }
        } else {
            return redirect()->back()->with('valid_school_id_back', 'Valid ID validation failed, ID format not accepted')->withInput();
        }


        //handle saving of new admin account
        try {
            // Check if the combination of fname and lname already exists
            $existingAdmin = User::where('fname', $new_admin->fname)
                ->where('lname', $new_admin->lname)
                ->first();

            if ($existingAdmin) {
                // Combination of fname and lname already exists, throw validation error
                throw ValidationException::withMessages([
                    'lname' => 'This user already exist.'
                ]);
            }

            // Combination of fname and lname does not exist, save the new admin
            $new_admin->save();

        } catch (ValidationException $e) {
            // Handle validation exception
            return redirect()->back()->withErrors($e->validator->errors())->withInput();

        } catch (\Exception $e) {
            // Handle other exceptions
            $errorMessage = 'An error occurred while saving the admin.';
            return redirect()->back()->withErrors(['error' => $errorMessage])->withInput();
        }
        return redirect()->route('login')->with('success', "Account Created Successfully!");
    }
}

