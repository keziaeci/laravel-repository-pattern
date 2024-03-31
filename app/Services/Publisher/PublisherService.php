<?php

namespace App\Services\Publisher;

use LaravelEasyRepository\BaseService;

interface PublisherService extends BaseService{
    function all() : PublisherService ;
    function findByName(string $name) : PublisherService ;
    function create($data) : PublisherService ;
}
