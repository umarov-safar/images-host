<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ImageController
{
    public function index(): AnonymousResourceCollection
    {
        $images = Image::sort()->get();

        return ImageResource::collection($images);
    }

    public function show(Image $image): ImageResource
    {
        return new ImageResource($image);
    }
}
