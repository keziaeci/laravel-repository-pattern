<?php

namespace App\Services\Game;

use LaravelEasyRepository\BaseService;

interface GameService extends BaseService{
    function all() : GameService;
    function findByTitle(string $title) : GameService ;
    function findByGenre(string $genre) : GameService ;
    function create($data) : GameService ;
}
