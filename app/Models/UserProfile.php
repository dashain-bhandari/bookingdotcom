<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        "invoice_address",
        "invoice_city",
        "invoice_country_id",
        "invoice_postcode",
        "user_id"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
