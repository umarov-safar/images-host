<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class DeleteOldZipFiles implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private int $oldFileMinute)
    {

    }

    /**
     * Джоб удаляет все zip файлов каторих лежат уже боле $oldFileMinute
     */
    public function handle(): void
    {
        $zipDirectory = new \DirectoryIterator(Storage::disk('public')->path('zips'));

        while ($zipDirectory->valid() and $zipDirectory->isFile()) {
            $file = $zipDirectory->current();
            $dateCreatedZipFile = $file->getFileInfo()->getCTime();
            $time = time() - $dateCreatedZipFile;

            if ((int)($time / 60) >= $this->oldFileMinute) {
                Storage::disk('public')->delete('zips/' . $file->getFilename());
            }

            $zipDirectory->next();
        }
    }
}
