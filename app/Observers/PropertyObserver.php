<?php

namespace App\Observers;

use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class PropertyObserver
{
    /**
     * Handle the Property "created" event.
     */

     public function creating(Property $property){
      if(is_null($property->owner_id))
      {
        $property->owner_id=Auth::user()->id;
      }
     }
    public function created(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "updated" event.
     */
    public function updated(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "deleted" event.
     */
    public function deleted(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "restored" event.
     */
    public function restored(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "force deleted" event.
     */
    public function forceDeleted(Property $property): void
    {
        //
    }
}
