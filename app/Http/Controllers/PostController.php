<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\PostRequest;
use App\Http\Resources\NotificationsResource;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use App\Notifications\PostAdded;
use App\Notifications\SendEmailNotification;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    use GeneralTrait;

    public function __construct()
    {
        return $this->middleware('api')->except(['index', 'show']);
    }

    public function index()
    {
        return new PostCollection(Post::paginate(10));
    }

    public function show($id)
    {

        return (new PostResource(Post::find($id)));
    }

    public function store(PostRequest $request)
    {
        $post = Post::create($request->validated());
        $users = User::all();
        Notification::send($users, new PostAdded($request->all()));
        return $this->returnSuccessMessage( 'Post Added Successfully');
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return $this->returnSuccessMessage( 'Post Updated Successfully');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        $post->deleteImage($post->image, 'posts');
        $post->deleteVideo($post->video, 'video');
        $post->comments()->delete();
        return $this->returnSuccessMessage( 'Post Deleted Successfully');
    }
// اضافه key و value داخل  key الdata

}
