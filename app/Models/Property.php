<?php

namespace App\Models;

use App\Observers\PropertyObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public static function booted()
    {
        parent::booted();
        self::observe(PropertyObserver::class);
    }
    protected $fillable = [
        'name',
        'owner_id',
        'address_postcode',
        'address_street',
        'city_id',
        'lat',
        'lon'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function apartments()
    {
        return $this->hasMany(Apartment::class)->chaperone();
    }

    public function facilities(){
        return $this->belongsToMany(Facility::class);
    }

}
