<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{


    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'user' => $this->user->name,
            'created_at' => $this->created_at->diffForHumans(),
            'replies' => $this->when($this->replies->count(), RepliesResource::collection($this->ChildrenReplies($this->id))),
        ];
    }
}

