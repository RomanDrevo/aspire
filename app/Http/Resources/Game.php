<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Category as CategoryResource;

class Game extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
        self::withoutWrapping();
    }



    public function toArray($request)
    {
        $categories = $this->categories()->get();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->img_uri,
            'categories' => CategoryResource::collection($categories)->pluck('name')->toArray(),
        ];
    }
}
