<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
    protected $fillable = [
        'fname',
        'lname',
        'country',
        'occupational_status',
        'school_name',
        'employer',
        'email',
        'valid_id',
    ];
}
