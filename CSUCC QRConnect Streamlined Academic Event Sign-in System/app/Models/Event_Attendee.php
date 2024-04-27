<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_Attendee extends Model
{
    use HasFactory;
    protected $table = 'event_attendees'; //ensure event_attendee name
    public $timestamps = false; //set timestamps to false
    protected $fillable = [
        'attendee_id',
        'event_id',
        'checkin'
    ];
}
