<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function render()
    {
        return view('livewire.Room');
    }
    use HasFactory;

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
