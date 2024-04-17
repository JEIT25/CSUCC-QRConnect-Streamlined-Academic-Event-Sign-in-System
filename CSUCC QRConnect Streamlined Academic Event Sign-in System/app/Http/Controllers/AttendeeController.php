<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Models\Attendee;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode; //qr code generator package
use Illuminate\Support\Facades\Storage; //store qr code
use thiagoalessio\TesseractOCR\TesseractOCR; // orcr text extraction from image
use Illuminate\Validation\ValidationException; //for handling validatione exception

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
                'type' => 'required|string|max:255',
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'country' => 'required|string|max:255',
                'occupational_status' => 'required|string|max:255',
                'school_name' => 'nullable|string|max:255',
                'employer' => 'nullable|string|max:255',
                'work_specialization' => 'nullable|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'valid_id' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // // Check if school_name is empty or not present in the request
            // if (!$request->filled('school_name')) {
            //     // Use the value from the hidden input field (school_name_hidden)
            //     $validatedData['school_name'] = $request->input('school_name_hidden');
            // }

            // Validation passed, continue to create new attendee

        } catch (ValidationException $e) {
            // Validation failed
            $errors = $e->validator->errors()->messages();

            // Redirect back to the form with validation errors and input data(not resetting input data in form)
            return redirect()->back()->withErrors($errors);
        }



        // Save validated data
        $new_attendee = new Attendee();
        $new_attendee->type = $validatedData['type'];
        $new_attendee->fname = $validatedData['fname'];
        $new_attendee->lname = $validatedData['lname'];
        $new_attendee->birth_date = $validatedData['birth_date'];
        $new_attendee->country = $validatedData['country'];
        $new_attendee->occupational_status = $validatedData['occupational_status'];
        $new_attendee->school_name = $validatedData['school_name'];
        $new_attendee->employer = $validatedData['employer'];
        $new_attendee->work_specialization = $validatedData['work_specialization'];
        $new_attendee->email = $validatedData['email'];
        $new_attendee->unique_code = Str::lower(Str::random(6)); //generate random lowercase unique code

        // Handle valid_id file upload and validation
        if ($request->hasFile('valid_id')) {
            $file = $request->file('valid_id');

            // Check if the file is valid
            if ($file->isValid()) {
                $fileName = $file->getClientOriginalName();
                // Create an instance of TesseractOCR and set the image path
                $ocr = new TesseractOCR($file);

                // Perform OCR and get the text result
                $text = $ocr->run();

                // Check if the OCR text contains both the first name and last name
                if (
                    Str::contains(strtolower($text), strtolower($request->input('fname'))) &&
                    Str::contains(strtolower($text), strtolower($request->input('lname')))
                ) {
                    // Both first name and last name are found in the OCR text
                    $filePath = $file->storeAs('attendee_ids', $fileName);

                    // set file path as attendee valid_id attribute
                    $new_attendee->valid_id = $filePath;

                    // Proceed with other operations (e.g., saving attendee data)
                } else {
                    // Either first name or last name is not found in the OCR text
                    // Redirect back to the register route
                    return redirect()->route('attendees.create')->with('invalid_id', 'Valid ID validation failed, unclear/invalid ID!')->withInput();
                }

                $filePath = $file->storeAs('attendee_ids', $fileName);

                // Save file path in the database
                $new_attendee->valid_id = $filePath;
            } else {
                return "Invalid file.";
            }
        }

        //Generate QR Code for new attendee
        $new_attendee_qrCode = QrCode::size(200)
            ->backgroundColor(255, 255, 0)
            ->color(0, 0, 255)
            ->margin(1)
            ->generate(
                $new_attendee->unique_code
            );
        // $qr_fileName = $new_attendee->fname . $new_attendee->lname . time() . 'svg';

        //store new qr code in server storage
        // Storage::disk('attendee_qrcodes')->put($qr_fileName, $new_attendee_qrCode);

        //save new attendee to database
        $new_attendee->save();
        return redirect()->route('attendees.show', ['attendee' => $new_attendee->id])->with(['attendee_qrCode' => $new_attendee_qrCode, 'new_attendee' => $new_attendee]);
    }

    /**
     * Display the specified resource.
     */
    public function show($attendee)
    {

        // Check if the attendee qr code exists in the session
        if (!session()->has('attendee_qrCode') || !session()->has('_token')) {
            return redirect()->route('attendees.create');
        }
        $new_attendee = session()->get('new_attendee');
        $attendee_qrCode = session()->get('attendee_qrCode');
        $id_text = session()->get('text');
        return view("attendees.show")->with(['attendee_qrCode' => $attendee_qrCode, 'new_attendee' => $new_attendee]);
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
