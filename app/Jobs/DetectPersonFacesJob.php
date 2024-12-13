<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;

class DetectPersonFacesJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(readonly public string $image)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $process = Process::run(env("PYTHON_RUN_COMMAND_OR_PATH") ." " .
            base_path("face_recognition/detect_faces.py") .
            "  --image=" .storage_path('app/public/' . $this->image).
            "  --faces=" .storage_path('app/private/faces')
        );

        Log::info($process->command());
    }
}
