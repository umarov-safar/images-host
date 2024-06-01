<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use App\Services\ImageService;
use Illuminate\View\View;

class ImageController extends Controller
{
    public function __construct(private readonly ImageService $imageService)
    {
    }

    public function index(): View
    {
        return view('welcome');
    }

    public function create(): View
    {
        return view('images.create');
    }

    public function store(StoreImageRequest $request)
    {
        $this->imageService->insert($request->getFiles());

        return redirect(route('images.index'));
    }

    public function show(Image $image)
    {
        //
    }

    public function edit(Image $image)
    {
        //
    }

    public function update(UpdateImageRequest $request, Image $image)
    {
        //
    }

    public function destroy(Image $image)
    {
        //
    }
}
