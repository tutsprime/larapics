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
        $moderateComments = $this->moderateComments($image);
        extract($moderateComments);

        $image->comments()->create($request->getData() + $approvement);

        return back()->with('message', $message);
    }

    protected function moderateComments($image)
    {
        if ($image->user_id !== auth()->user()->id && $image->user->setting->moderate_comments) {
            $message = "Your comment is awaiting moderation. It will be visible after it has been approved.";
            $approvement = ['approved' => false];
        } else {
            $message = "Your comment has been sent";
            $approvement = ['approved' => true];
        }

        return compact('approvement', 'message');
    }
}
