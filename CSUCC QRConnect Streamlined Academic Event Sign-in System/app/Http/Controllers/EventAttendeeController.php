<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event_Attendee;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class EventAttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve all attendees associated with the event_attendee records for the specified event_id
        $attendees = Attendee::whereHas('eventAttendees', function ($query) use ($request) {
            $query->where('event_id', $request->query('event_id'));
        })->with('eventAttendees')->get();

        return view('event-attendees.index', ['attendees' => $attendees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createCheckIn()
    {
        return view('event-attendees.checkin');
    }

    public function createCheckout()
    {
        return view('event-attendees.checkout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function checkIn(Request $request)
    {
        try {
            // Validate the incoming request data (assuming the QR code contains a valid unique code)
            $request->validate([
                'qr_code' => 'required|string|max:255', // Add validation rules for the QR code
            ]);

            // Search for the attendee based on the unique code from the QR code
            $attendee = Attendee::where('unique_code', $request->qr_code)->first();

            if (!$attendee) {
                // Attendee not found
                return response()->json([
                    'success' => false,
                    'message' => 'Attendee not found.',
                ]);
            }

            // Check if the attendee is already registered for the event
            $existingEventAttendee = Event_Attendee::where('event_id', $request->event_id)
                ->where('attendee_id', $attendee->id)
                ->first();

            if (!$existingEventAttendee) {
                // Attendee not registered for the event, create a new record
                $eventAttendee = new Event_Attendee();
                $eventAttendee->event_id = $request->event_id; // Replace $request->event_id with the actual event ID
                $eventAttendee->attendee_id = $attendee->id;
                $eventAttendee->checkin = Carbon::now()->toDateTimeString(); // Set current datetime as check-in time
                $eventAttendee->save();

                // Attendee successfully registered and checked in for the event
                return response()->json([
                    'success' => true,
                    'message' => 'Attendee checked in successfully!',
                    'attendee' => [
                        'type' => $attendee->type,
                        'checkin' => $eventAttendee->checkin,
                        'fname' => $attendee->fname,
                        'lname' => $attendee->lname,
                        'birth_date' => $attendee->birth_date,
                        'occupational_status' => $attendee->occupational_status,
                        'school_name' => $attendee->school_name,
                        'employer' => $attendee->employer,
                        'work_specialization' => $attendee->work_specialization,

                    ]
                ]);
            }

            // Check if the attendee has already checked in
            if ($existingEventAttendee->checkin) {
                // Attendee already checked in
                return response()->json([
                    'success' => true,
                    'message' => 'Attendee has already checked in for this event.',
                    'attendee' => [
                        'type' => $attendee->type,
                        'checkin' => $existingEventAttendee->checkin,
                        'fname' => $attendee->fname,
                        'lname' => $attendee->lname,
                        'birth_date' => $attendee->birth_date,
                        'occupational_status' => $attendee->occupational_status,
                        'school_name' => $attendee->school_name,
                        'employer' => $attendee->employer,
                        'work_specialization' => $attendee->work_specialization,

                    ]
                ]);
            }

            // Update the check-in time
            $existingEventAttendee->checkin = Carbon::now()->toDateTimeString();
            $existingEventAttendee->save();

            // Attendee successfully checked in
            return response()->json([
                'success' => true,
                'message' => 'Attendee checked in successfully.',
                'attendee' => [
                    'type' => $attendee->type,
                    'checkin' => $existingEventAttendee->checkin,
                    'fname' => $attendee->fname,
                    'lname' => $attendee->lname,
                    'birth_date' => $attendee->birth_date,
                    'occupational_status' => $attendee->occupational_status,
                    'school_name' => $attendee->school_name,
                    'employer' => $attendee->employer,
                    'work_specialization' => $attendee->work_specialization,
                ]
            ]);

        } catch (\Exception $e) {
            // Handle exceptions or errors
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function checkOut(Request $request)
    {
        try {
            // Validate the incoming request data (assuming the QR code contains a valid unique code)
            $request->validate([
                'qr_code' => 'required|string|max:255', // Add validation rules for the QR code
            ]);

            // Search for the attendee based on the unique code from the QR code
            $attendee = Attendee::where('unique_code', $request->qr_code)->first();

            if (!$attendee) {
                // Attendee not found
                return response()->json([
                    'success' => false,
                    'message' => 'Attendee not found.',
                ]);
            }

            // Check if the attendee is already registered for the event
            $existingEventAttendee = Event_Attendee::where('event_id', $request->event_id)
                ->where('attendee_id', $attendee->id)
                ->first();

            if (!$existingEventAttendee) {
                // Attendee not registered for the event, create a new record
                $eventAttendee = new Event_Attendee();
                $eventAttendee->event_id = $request->event_id; // Replace $request->event_id with the actual event ID
                $eventAttendee->attendee_id = $attendee->id;
                $eventAttendee->checkout = Carbon::now()->toDateTimeString(); // Set current datetime as checkout time
                $eventAttendee->save();

                // Attendee successfully registered and checked out for the event
                return response()->json([
                    'success' => true,
                    'message' => 'Attendee checked out successfully.',
                    'attendee' => [
                        'type' => $attendee->type,
                        'checkout' => $eventAttendee->checkout,
                        'fname' => $attendee->fname,
                        'lname' => $attendee->lname,
                        'birth_date' => $attendee->birth_date,
                        'occupational_status' => $attendee->occupational_status,
                        'school_name' => $attendee->school_name,
                        'employer' => $attendee->employer,
                        'work_specialization' => $attendee->work_specialization,

                    ]
                ]);
            }

            // Check if the attendee has already checked out
            if ($existingEventAttendee->checkout) {
                // Attendee already checked out
                return response()->json([
                    'success' => true,
                    'message' => 'Attendee has already checked out for this event.',
                    'attendee' => [
                        'type' => $attendee->type,
                        'checkout' => $existingEventAttendee->checkout,
                        'fname' => $attendee->fname,
                        'lname' => $attendee->lname,
                        'birth_date' => $attendee->birth_date,
                        'occupational_status' => $attendee->occupational_status,
                        'school_name' => $attendee->school_name,
                        'employer' => $attendee->employer,
                        'work_specialization' => $attendee->work_specialization,

                    ]
                ]);
            }

            // Update the checkout time
            $existingEventAttendee->checkout = Carbon::now()->toDateTimeString();
            $existingEventAttendee->save();

            // Attendee successfully checked out
            return response()->json([
                'success' => true,
                'message' => 'Attendee checked out successfully.',
                'attendee' => [
                    'type' => $attendee->type,
                    'checkout' => $existingEventAttendee->checkout,
                    'fname' => $attendee->fname,
                    'lname' => $attendee->lname,
                    'birth_date' => $attendee->birth_date,
                    'occupational_status' => $attendee->occupational_status,
                    'school_name' => $attendee->school_name,
                    'employer' => $attendee->employer,
                    'work_specialization' => $attendee->work_specialization,
                ]
            ]);

        } catch (\Exception $e) {
            // Handle exceptions or errors
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }



    public function exportAttendancePdf($event_id, $event_name)
    {
        // Fetch event attendees for the specified event ID
        $attendees = Attendee::whereHas('eventAttendees', function ($query) use ($event_id) {
            $query->where('event_id', $event_id);
        })->with('eventAttendees')->get();

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content into Dompdf
        $html = view('pdf.eventAttendees', compact('attendees', 'event_name'))->render();
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('legal', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Output the generated PDF
        return $dompdf->stream('attendance.pdf');
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
    public function destroy($id)
    {
        try {
            // Find the event attendee by its ID
            $eventAttendee = Event_Attendee::findOrFail($id);

            // Delete the event attendee
            $eventAttendee->delete();

            // Redirect back to a relevant page
            return redirect()->back()->with('success', 'Event attendee deleted successfully!');
        } catch (\Exception $e) {
            // Catch any exceptions and return an error message
            return redirect()->back()->with('error', 'Failed to delete event attendee: ' . $e->getMessage());
        }
    }
}