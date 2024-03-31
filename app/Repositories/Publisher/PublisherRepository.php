<?php

namespace App\Repositories\Publisher;

use App\Models\Publisher;
use LaravelEasyRepository\Repository;

interface PublisherRepository extends Repository{

    // Write something awesome :)
    function all();
    function findByName(string $name) : ?Publisher ;
    function create($data) : Publisher;

}
