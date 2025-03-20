<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    /** @use HasFactory<\Database\Factories\BedFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "bed_type_id",
        "room_id"
    ];
    public function bedType()
    {
        return $this->belongsTo(BedType::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
}
