<?php

use App\Jobs\DeleteOldZipFiles;
use Illuminate\Support\Facades\Schedule;

Schedule::job(new DeleteOldZipFiles(1))
    ->everyFiveSeconds();

