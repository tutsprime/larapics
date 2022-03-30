<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::published()->latest()->paginate(15)->withQueryString();

        return view('image.index', compact('images'));
    }

    public function show(Image $image)
    {
        return view('image.show', compact('image'));
    }

    public function create()
    {
        return view("image.create");
    }

    public function store(ImageRequest $request)
    {
        Image::create($request->getData());
        return to_route('images.index')->with('message', "Image has been uploaded successfully");
    }
    
    public function edit(Image $image)
    {
        $this->authorize('update', $image);

        return view("image.edit", compact('image'));
    }

    public function update(Image $image, ImageRequest $request)
    {
        $this->authorize('update', $image);

        $image->update($request->getData());
        return to_route('images.index')->with('message', "Image has been updated successfully");
    }
    
    public function destroy(Image $image)
    {
        $this->authorize('delete', $image);
        
        $image->delete();
        return to_route('images.index')->with('message', "Image has been removed successfully");
    }
}
