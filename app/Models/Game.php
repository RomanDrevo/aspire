<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Game extends Model{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'img_uri', 'playmodes'
    ];


    protected $hidden = ['pivot'];

    public $casts = ['playmodes' => 'array'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


}
