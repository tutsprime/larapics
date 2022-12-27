<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Image;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Image $image, CreateCommentRequest $request)
    {
        $image->comments()->create($request->getData());

        if ($image->user->setting->moderate_comments) {
            $message = "Your comment is awaiting moderation. It will be visible after it has been approved";
          } else {
            $message = "Your comment has been sent";
          }

        return back()->with('message', $message);
    }
}
