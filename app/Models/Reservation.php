<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'Reservation';

    protected $fillable = [
        'user_id',
        'room_id',
        'check_in',
        'check_out',
        'description',
        'is_active'
    ];
}
