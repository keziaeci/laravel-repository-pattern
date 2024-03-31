<?php

namespace App\Repositories\Genre;

use App\Models\Genre;
use LaravelEasyRepository\Repository;

interface GenreRepository extends Repository{
    function all();
    function create($data) : Genre;
}
