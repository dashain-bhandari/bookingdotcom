<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'property_id',
        'capacity_adults',
        'capacity_children',
        'apartment_type_id',
        'size',
        'bathrooms'
    ];
    public function beds()
    {
        return $this->hasManyThrough(Bed::class, Room::class)->with('bedType');
    }
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function apartmentType()
    {
        return $this->belongsTo(ApartmentType::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    public function getBedListsAttribute()
    {
        $allbeds = $this->beds->groupBy('bedType.name');
        $beds = $this->beds;
        if ($allbeds->count() == 1) {
            $bed_lists = $beds->count() . '  ' . str($allbeds->keys()[0])->plural($beds->count());
        } else {
            $bed_lists = $beds->count() . '  ' . str('bed')->plural($beds->count());
            $bedListsArr = [];
            foreach ($allbeds as $key => $value) {
                $count = $value->count();
                $bedListsArr[] = $count . " " . str($key)->plural($value->count());
            }
            $bed_lists .= " (" . implode(', ', $bedListsArr) . ")";
        }
        return $bed_lists;
    }
    public function getFacilitiesCategoriesAttribute()
    {
        $facilities = $this->facilities->groupBy('category.name')->toArray();
        $facilities = array_map(function ($facility) {
            return array_map(function ($items) {
            return $items['name'];
            }, $facility);
        }, $facilities);
        return $facilities;
    }
}
