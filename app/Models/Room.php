<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';

    protected $fillable = [
        'room_type_id',
        'name',
        'price',
        'description',
        'is_active'
    ];

    public function room_type(){
        return $this->belongsTo('App\Models\RoomType', 'room_type_id');
    }
}
