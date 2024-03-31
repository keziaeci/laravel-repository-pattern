<?php

namespace App\Repositories\Publisher;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Publisher;

class PublisherRepositoryImplement extends Eloquent implements PublisherRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Publisher $model)
    {
        $this->model = $model;
    }

    function all() {
        return $this->model->all();
    }

    function findByName(string $name): ?Publisher {
        return $this->model->where('name' , 'LIKE' , "%$name%")->first();
    }

    function create($data) : Publisher {
        return $this->model->create($data);
    }
}
