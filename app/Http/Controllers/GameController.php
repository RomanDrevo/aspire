<?php

namespace App\Http\Controllers;


use App\Http\Resources\GameCollection;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{


    public function get(Request $request)
    {
        $params = $request->only(['text', 'playmode']);

        $query = Game::query();


        if(isset($params['text'])) {
            $query->where('name', 'like', "%".$params['text']."%");
        }

        if(isset($params['playmode'])) {
            $query->whereJsonContains('playmodes', ['mode' => $params['playmode']]);
        }

        $games = $query->get();


        return response(new GameCollection($games), 200);

    }
}
