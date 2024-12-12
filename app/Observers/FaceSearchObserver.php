<?php

namespace App\Observers;

use App\Jobs\ValidateIfFaceExistsJob;
use App\Models\FaceSearch;
use Illuminate\Support\Facades\Storage;

class FaceSearchObserver
{
    /**
     * Handle the FaceSearch "created" event.
     */
    public function created(FaceSearch $face_search): void
    {
        ValidateIfFaceExistsJob::dispatch($face_search);
    }


    /**
     * Handle the FaceSearch "deleting" event.
     */
    public function deleting(FaceSearch $faceSearch): void
    {
        Storage::disk('temporary_images_for_search')->delete($faceSearch->image);
    }

}
