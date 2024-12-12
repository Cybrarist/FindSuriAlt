<?php

namespace App\Observers;

use App\Jobs\DetectPersonFacesJob;
use App\Models\Person;

class PersonObserver
{
    /**
     * Handle the Person "created" event.
     */
    public function created(Person $person): void
    {
        foreach ($person->images as $image)
            DetectPersonFacesJob::dispatch($image);
    }

    /**
     * Handle the Person "updated" event.
     */
    //todo remove faces that don't have images anymore
    public function updated(Person $person): void
    {
        foreach ($person->images as $image)
            DetectPersonFacesJob::dispatch($image);
    }

    /**
     * Handle the Person "deleted" event.
     */
    //todo remove faces that don't have images anymore
    public function deleted(Person $person): void
    {
        //
    }

}
