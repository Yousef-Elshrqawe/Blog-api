<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{

    public $collects = 'App\Http\Resources\PostResource';

    public function toArray($request)
    {
        return [
            'Posts' => $this->collection,
        ];
    }

}
