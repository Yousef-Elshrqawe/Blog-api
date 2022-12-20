<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    const IMAGEPATH = 'posts' ;
    const VideoPATH = 'video' ;

    use HasFactory;


    protected $fillable = ['title', 'body', 'can_comment', 'video', 'image', 'user_id',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    //Boot image
    public static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->user_id = Auth::guard('api')->user()->getKey();
            //image
            if (request()->has('image')) {
                $post->image = request()->file('image')->store(Post::IMAGEPATH);
            }
            //video
            if (request()->has('video')) {
                $post->video = request()->file('video')->store(Post::VideoPATH);
            }
        });
    }
}
