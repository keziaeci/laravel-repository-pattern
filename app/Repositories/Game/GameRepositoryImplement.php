<?php

namespace App\Repositories\Game;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Game;

class GameRepositoryImplement extends Eloquent implements GameRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Game $model)
    {
        $this->model = $model;
    }

    function all() {
        return $this->model->all();
    }

    function findByTitle(string $title): ?Game {
        return $this->model->where('title' , 'LIKE' , "%$title%")->first();
    }

    function findByGenre(string $genre): ?Game {
        return $this->model->whereRelation('genre' , 'name' , 'LIKE' , "%$genre%")->first();
    }

    function create($data) : Game {
        return $this->model->create($data);
    }
}
