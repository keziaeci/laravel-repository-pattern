<?php

namespace App\Repositories\User;

use App\Models\User;
use LaravelEasyRepository\Repository;

interface UserRepository extends Repository{

    // Write something awesome :)

    /**
     * find a user by name
     * @param string $name
     * @return User
     */
    function findByName(string $name) : User ;
}
