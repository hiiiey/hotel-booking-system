<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'start_date',
        'end_date',

    ];



    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_id', 'id');
    }
}
