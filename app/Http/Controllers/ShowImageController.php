<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ShowImageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Image $image, Request $request)
    {
        $comments = $image->comments()->with('user')->latest()->get();

        return view('image-show', compact('image', 'comments'));
    }
}
