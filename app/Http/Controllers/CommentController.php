<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Image;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $comments = Comment::forUser(auth()->user())->latest()->paginate(10);

        return view("comments.index", compact('comments'));
    }

    public function update(Comment $comment, Request $request)
    {
        $comment->approved = $request->approve;
        $comment->update();

        return back()->with('message', "Comment has been " . ($request->approved ? "approved" : "unapproved"));
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
