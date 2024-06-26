<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event_Attendee extends Model
{
    use HasFactory;

    public function events(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    // Specify the factory class for this model
    protected static function newFactory()
    {
        return \Database\Factories\EventAttendeeFactory::new();
    }


    protected $table = 'event_attendees'; //ensure event_attendee name
    public $timestamps = false; //set timestamps to false
    protected $fillable = [
        'attendee_id',
        'event_id',
        'checkin'
    ];

}
