<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;

class ImageService
{
    public function insert(array $files)
    {
        /** @var UploadedFile $file */
        $files = array_map(function (UploadedFile $file) {
            return ['name' => $this->uploadFileAndGetName($file)];
        }, $files);

        return Image::insert($files);
    }


    public function makeZipFile(Image $image)
    {
        $zip = new ZipArchive();
        $zipFile = pathinfo($image->name, PATHINFO_FILENAME) . '.zip';
        $zipFilePath = Storage::disk('public')->path($zipFile);

        if (! $zip->open($zipFilePath, ZipArchive::CREATE)) {
            throw new \Exception("Can not open $zipFilePath");
        }
        $zip->addFile(public_path('storage/images/' . $image->name), $image->name);
        $zip->close();

        return $zipFilePath;
    }


    private function uploadFileAndGetName(UploadedFile $file): string
    {
        $fileName = $this->makeUniqueFileName($file);

        Storage::disk('public')->putFileAs('images', $file, $fileName);

        return $fileName;
    }

    private function makeUniqueFileName(UploadedFile $file): string
    {
        $transliteratedFileName = pathinfo(Str::transliterate($file->getClientOriginalName()), PATHINFO_FILENAME);
        $transliteratedFileName = strtolower($transliteratedFileName);
        $extension = $file->getClientOriginalExtension();
        $fileName = sprintf('%s.%s', $transliteratedFileName, $extension);

        if (Storage::disk('public')->fileExists("images/$fileName")) {
            $fileName = sprintf('%s_%s.%s', $transliteratedFileName, time(), $extension);
        }

        return $fileName;
    }

}
