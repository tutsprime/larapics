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
        $comments = Comment::forUser(auth()->user())
            ->with(['user', 'image'])
            ->latest()
            ->paginate(10);

        return view('comments.index', compact('comments'));
    }

    public function update(Comment $comment, Request $request)
    {
        $comment->approved = $request->approved == 1;
        $comment->update();

        return back()
            ->with('updated', $comment->id)
            ->with('message', "Comment has been " . ($comment->approved ? "approved" : "unapproved"));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('message', "Comment has been removed.");
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
