<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GameCollection extends ResourceCollection
{

    public $collects = 'App\Http\Resources\Game';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'games' => $this->resource,
        ];


    }



}
