<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event_Attendee;
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
    public function create()
    {
        return view('event-attendees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

            if ($existingEventAttendee) {
                // Attendee already registered for the event
                return response()->json([
                    'success' => false,
                    'message' => 'Attendee is already registered for this event.',
                    'attendee' => [
                        'type' => $attendee->type,
                        'fname' => $attendee->fname,
                        'lname' => $attendee->lname,
                        'birth_date' => $attendee->birth_date,
                        'country' => $attendee->country,
                        'occupational_status' => $attendee->occupational_status,
                        'school_name' => $attendee->school_name,
                        'employer' => $attendee->employer,
                        'work_specialization' => $attendee->work_specialization,
                        // Add more attendee information as needed
                    ]
                ]);
            }



            // Create a new Event_Attendee record
            $eventAttendee = new Event_Attendee();
            $eventAttendee->event_id = $request->event_id; // Replace $request->event_id with the actual event ID
            $eventAttendee->attendee_id = $attendee->id;
            $eventAttendee->checkin = now(); // Set current datetime as check-in time
            $eventAttendee->save();

            // Attendee found and registered for the event, return the attendee's information
            return response()->json([
                'success' => true,
                 'message' => "Event Attendee Record, Generated SuccessFully",
                'attendee' => [
                    'type' => $attendee->type,
                    'fname' => $attendee->fname,
                    'lname' => $attendee->lname,
                    'birth_date' => $attendee->birth_date,
                    'country' => $attendee->country,
                    'occupational_status' => $attendee->occupational_status,
                    'school_name' => $attendee->school_name,
                    'employer' => $attendee->employer,
                    'work_specialization' => $attendee->work_specialization,
                    // Add more attendee information as needed
                ]
            ]);
        } catch (\Exception $e) {
            // Handle other exceptions or errors
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
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
