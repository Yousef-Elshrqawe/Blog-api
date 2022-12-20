<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'status',
        'user_id',
        'post_id',
        'commentable_id',
        'commentable_type',


    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function commentable()
    {
        return $this->morphTo();
    }
    public function replies()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function ChildrenReplies($id)
    {
        //Recursion to get all replies
        $comments = Comment::all()->where('commentable_type', 'App\Models\Comment'); //get all comments
        $children = []; //create empty array
        foreach ($comments as $comment) { // loop through comments
            if ($comment->commentable_id == $id) { // if commentable_id == id
                $children[] = $comment; // add comment to array
                $children = array_merge($children, $this->ChildrenReplies($comment->id)); // add comment to array
            }
        }
        return $children;
    }
    public static function boot()
    {
        parent::boot();
        static::creating(function ($comment) {
            $comment->user_id = Auth::guard('api')->user()->getKey();

        });
    }
}


