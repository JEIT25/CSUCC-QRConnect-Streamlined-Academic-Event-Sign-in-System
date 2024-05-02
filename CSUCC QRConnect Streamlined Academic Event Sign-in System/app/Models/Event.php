<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{

    use HasFactory;

    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function event_attendees(): HasMany
    {
        return $this->HasMany(Event_Attendee::class);
    }


    protected $fillable = [
        'name' ,
        'description' ,
        'location',
        "start_date_time" ,
        "profile_image"
    ];
}
