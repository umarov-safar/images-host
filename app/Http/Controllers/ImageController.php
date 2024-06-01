<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
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
        $data = Image::sort()->cursorPaginate(25);

        return view('welcome', compact('data'));
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

    public function downloadZip(Image $image)
    {
        $zipFile = $this->imageService->makeZipFile($image);

        return response()->download($zipFile);
    }
}
