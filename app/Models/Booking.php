<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'booked_house',
        'price',
        'appointment_date',
        'contact',
        'is_paid',
        'is_approved',
    ];
}
