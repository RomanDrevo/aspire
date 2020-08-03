<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use \App\Models\Game;
class CommonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents(storage_path('games.json')), true);
        $games = $data['games']['instant'] ?? [];
        $categories = $data['categories']['mainCategories'] ?? [];
        $this->addGames($games);
        $this->addCategories($categories);
    }


    private function addGames($games)
    {
        foreach ($games as $game) {

            $data = [
                'id' => $game['id'],
                'name' => $game['name'],
                'img_uri' => $game['backgroundImageUrl'],
                'playmodes' => json_encode(['mode' => $game['playModes']])
            ];
            Game::insert($data);
        }
    }


    private function addCategories($categories)
    {
        foreach ($categories as $c) {
            $name = $c["name"];
            $subCats = $c["subCategories"] ?? [];

            $gameIds = [];

            foreach ($subCats as $s) {
                $gameIds[] = $s["instantGamesOrder"];
            }

            $merged = call_user_func_array('array_merge', $gameIds);

            //create category
            $cat = Category::create(['name' => $name]);

            //update relationships  - pivot table
            $cat->games()->sync($merged);
        }
    }

}
