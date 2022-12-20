<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use App\Notifications\commentNotification;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    use GeneralTrait;

    public function store(Post $post, CommentRequest $request)
    {
        $comment = $post->comments()->create($request->validated());
        $comment->post_id = $post->id;
        $comment->save();
        $post->user->notify(new commentNotification($comment));
        return $this->returnSuccessMessage('Comment Added Successfully');
    }

    public function repliesStore(Comment $comment, CommentRequest $request)
    {
        $reply = $comment->replies()->create($request->validated());
        $reply->post_id = $comment->post_id;
        $reply->save();
        $comment->user->notify(new commentNotification($reply));
        return $this->returnSuccessMessage('Reply Added Successfully');
    }

    //all replies
    public function replies(Comment $comment)
    {
        //get all replies
        $replies = Comment::all()->where('commentable_type', 'App\Models\Comment');
        return $this->returnData('replies', $replies);
    }


}
