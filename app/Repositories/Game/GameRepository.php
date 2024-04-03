<?php

namespace App\Repositories\Game;

use App\Models\Game;
use LaravelEasyRepository\Repository;

interface GameRepository extends Repository{
    function all();
    function findByTitle(string $title) : ?Game ;
    function findByGenre(string $genre) : ?Game ;
    function create($data) : Game ;
    function update($id, $data) : Game;
    function delete($id);
}
