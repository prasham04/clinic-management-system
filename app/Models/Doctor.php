<?php

namespace App\Models;

use App\Models\Major;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'major_id'
    ];

    public const IMAGE_PATH = 'images/doctors/';

    public static $rules = [
        'name' =>'required|string|max:255',
        'major_id' =>'required|exists:majors,id'
    ];

    public function major() {
        return $this->belongsTo(Major::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
