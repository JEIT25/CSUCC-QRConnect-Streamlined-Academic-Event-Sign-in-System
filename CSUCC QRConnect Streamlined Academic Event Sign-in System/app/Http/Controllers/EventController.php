<?php

namespace App\Http\Controllers;

use App\Models\Event;
use DateTime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the authenticated user
        $user = auth()->user();
        $userId = auth()->id();

        // Check if the user exists
        if ($user) {
            // Retrieve paginated events for the authenticated user
            $events = User::find($userId)->events()->paginate(10);
            // Pass the $events variable to the view
            return view('events.index')->with(['events' => $events]);
        } else {
            // Handle the case where the user is not authenticated
            return redirect()->route('login')->with('error', 'You must be logged in to view events.');
        }

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'location' => 'required|string|max:255',
            'start_date_time' => 'required|date_format:Y-m-d\TH:i:s',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:6048', // Add validation for profile image
        ]);
        $path = '';
        // Store the uploaded profile image
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            //image will be stored in the public dir
            $path = $file->store('event_profile_images', 'event_profile_images');
        } else {
            $path = null;
        }

        $dateTime = new DateTime($request->start_date_time);
        // Format the DateTime object to the desired format
        $formattedDateTime = $dateTime->format('Y-m-d H:i:s');

        // Create a new event instance with profile image path
        $event = new Event([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'start_date_time' => $formattedDateTime,
            'profile_image' => $path, // Add profile image path to event attributes
        ]);

        // Associate the event with the authenticated user
        $event->user_id = auth()->id();

        // Save the event to the database
        $event->save();

        // Redirect the user to a relevant page (e.g., show the newly created event)
        return redirect()->route('events.show', $event->id)->with('success', 'Event created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Check if a user is authenticated
        if (Auth::check()) {

            // Find the event by its ID
            $event = Event::findOrFail($id);

            // Check if the authenticated user is the owner of the event
            $user = Auth::user();
            if ($event->user_id !== $user->id) {
                // If the user is not the owner, handle this scenario, e.g., show an error message
                return back()->with('error', 'You are not authorized to view this event.');
            }

            // If the user is the owner,  proceed to display the event details
            return view('events.show', ['event' => $event]);
        } else {
            // User is not authenticated, handle this scenario
            return redirect()->route('login')->with('error', 'You must be logged in to create an event.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Check if a user is authenticated
        if (Auth::check()) {

            // Find the event by its ID
            $event = Event::findOrFail($id);

            // Check if the authenticated user is the owner of the event
            $user = Auth::user();
            if ($event->user_id !== $user->id) {
                // If the user is not the owner, handle this scenario, e.g., show an error message
                return back()->with('error', 'You are not authorized to view this event.');
            }

            // If the user is the owner,  proceed to display the event details
            return view('events.edit', ['event' => $event]);
        } else {
            // User is not authenticated, handle this scenario
            return redirect()->route('login')->with('error', 'You must be logged in to create an event.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'location' => 'required|string|max:255',
            'start_date_time' => 'required|date_format:Y-m-d\TH:i:s',
        ]);

        // Create a DateTime object from the start_date_time input
        $dateTime = new DateTime($request->start_date_time);

        // Format the DateTime object to the desired format
        $formattedDateTime = $dateTime->format('Y-m-d H:i:s');


        // Assign the formatted datetime back to the request
        $request->merge(['start_date_time' => $formattedDateTime]);



        // Update the event with the validated data
        $event = Event::findOrFail($id);
        $event->update($validatedData);

        // Redirect the user to a relevant page (e.g., show the updated event)
        return redirect()->route('events.show', $event->id)->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the event by ID
        $event = Event::findOrFail($id);

        // Delete the profile image if it exists
        if ($event->profile_image) {
            Storage::delete('public/event_profile_images/' . basename($event->profile_image));
        }

        // Delete the event
        $event->delete();

        // Redirect back to a relevant page
        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }

}
