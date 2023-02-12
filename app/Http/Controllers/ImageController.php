<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        
        $this->authorizeResource(Image::class);
    }

    public function index()
    {
        $images = Image::visibleFor(request()->user())->latest()->paginate(15)->withQueryString();

        return view('image.index', compact('images'));
    }

    public function create()
    {
        return view("image.create");
    }

    public function store(ImageRequest $request)
    {
        $image = Image::create($data = $request->getData());
        $image->syncTags($data['tags']);
        return to_route('images.index')->with('message', "Image has been uploaded successfully");
    }
    
    public function edit(Image $image)
    {
        return view("image.edit", compact('image'));
    }

    public function update(Image $image, ImageRequest $request)
    {
        $image->update($data = $request->getData());
        $image->syncTags($data['tags']);
        return to_route('images.index')->with('message', "Image has been updated successfully");
    }
    
    public function destroy(Image $image)
    {
        $image->delete();
        return to_route('images.index')->with('message', "Image has been removed successfully");
    }
}
