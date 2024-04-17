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
        'type',
        'fname',
        'lname',
        'birth_date',
        'country',
        'occupational_status',
        'school_name',
        'employer',
        'work_specialization',
        'email',
        'valid_id',
        'unique_code'
    ];
}
