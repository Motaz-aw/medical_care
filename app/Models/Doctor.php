<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Doctor extends Authenticatable
{
    use HasRoles,HasFactory;
    public function clinic(){
        return $this->belongsTo(Clinic::class,'clinic_id');
    }

    public function bookings(){
        return $this->hasMany(Booking::class,'booking_id');
    }
}
