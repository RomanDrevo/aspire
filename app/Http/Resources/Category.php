<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->withoutWrapping();
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $result = [
            'id' => $this->id,
            'name' => $this->name,
        ];
        return $result;
    }
}
