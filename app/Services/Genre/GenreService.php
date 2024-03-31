<?php

namespace App\Services\Genre;

use LaravelEasyRepository\BaseService;

interface GenreService extends BaseService{

    function all() : GenreService ;
    function create($data) : GenreService;
}
