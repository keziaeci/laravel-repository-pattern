<?php

namespace App\Services\User;

use App\Http\Requests\PostUserRequest;
use Illuminate\Http\Request;
use LaravelEasyRepository\BaseService;

interface UserService extends BaseService{

    // Write something awesome :)

    function all() : UserService ;
    function find($id) : UserService ;
    function findByName(string $name) : UserService ;
    function findByEmail(string $email) : UserService ;
    function findByUsername(string $username) : UserService ;
    function create($data) : UserService ;
    function update($id, $data) : UserService;
    function delete($id): UserService;
}
