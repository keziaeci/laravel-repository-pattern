<?php

namespace App\Repositories\User;

use App\Models\User;
use LaravelEasyRepository\Repository;

interface UserRepository extends Repository{

    // Write something awesome :)

    
    function all();

    function find($id) : ?User ;
    /**
     * find a user by name
     * @param string $name
     * @return User
     */
    function findByName(string $name) : ?User ;
    function findByEmail(string $email) : ?User ;
    function findByUsername(string $username) : ?User ;
    function create($data) : User;
    function update($id, $data) : User;
    function delete($id);
}
