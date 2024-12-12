<?php

namespace App\Jobs;

use App\Models\FaceSearch;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Str;

class ValidateIfFaceExistsJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(readonly private FaceSearch $face_search) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $result = Process::run(env("PYTHON_RUN_COMMAND_OR_PATH") ." " .
            base_path("face_recognition/validate_face.py") .
            "  --image=" .storage_path('app/private/temporary_images/' . $this->face_search->image) .
            "  --faces=" .storage_path('app/private/faces')
        );

        $files= json_decode($result->output());

        $people_with_images=\App\Models\Person::query();

        $people_with_images->whereLike('images' , '%' . Str::of($files[0])->remove(storage_path('app/private/faces/'))->explode("_face")[0]. '%');

        if (sizeof($files) > 1) {
            unset($files[0]);
            foreach ($files as $file)
                $people_with_images->orWhereLike('images' , '%' . Str::of($file)->remove(storage_path('app/private/faces/'))->explode("_face")[0] . '%');
        }

        $people_found=$people_with_images->get();

        Mail::send(new \App\Mail\PersonFoundMail(people:  $people_found , email: $this->face_search->email ));

        $this->face_search->delete();
    }
}
