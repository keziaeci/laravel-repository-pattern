<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\PostUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }
    
    function getAll() : JsonResponse {
        return Cache::remember('users' , 60 , function () {
            return $this->userService->all()->toJson();
        });
    }

    function findId($id) : JsonResponse {
        return Cache::remember('users.find' , 60 , function () use ($id) {
            return $this->userService->find($id)->toJson();
        });
    }

    function findName($name) : JsonResponse {
        return Cache::remember('users.find.name' , 60 , function () use ($name) {
            return $this->userService->findByName($name)->toJson();
        });
    }

    function findEmail($email) : JsonResponse {
        return Cache::remember('users.find.email' , 60 , function () use ($email) {
            return $this->userService->findByEmail($email)->toJson();
        });
    
    }

    function findUsername($username) : JsonResponse {
        return Cache::remember('users.find' , 60 , function () use ($username) {
            return $this->userService->findByUsername($username)->toJson();
        });
    }

    function createUser(PostUserRequest $req) : JsonResponse {
        $data = $req->validated();
        return $this->userService->create($data)->toJson();
    }

    function updateUser( $id, UpdateUserRequest $req) : JsonResponse {
        $data = $req->validated();
        return $this->userService->update($id,$data)->toJson();
    }
    
    function deleteUser($id) : JsonResponse {
        return $this->userService->delete($id)->toJson();
    }
    
}
