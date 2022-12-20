<?php

namespace App\Http\Resources;

use App\Http\Requests\Api\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    // recursive function to create the hierarchy
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'image' => $this->image,
            'video' => $this->video,
            'user' => $this->user->name,
           'comments' => $this->when($this->comments->count(), CommentResource::collection($this->comments)),

        ];
    }



}
