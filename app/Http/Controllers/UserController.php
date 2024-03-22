<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }
    
    function getAll() : JsonResponse {
        return $this->userService->all()->toJson();
    }
    function findName($name) : JsonResponse {
        return $this->userService->findByName($name)->toJson();
    }

    function findId($id) : JsonResponse {
        return $this->userService->find($id)->toJson();
    }

    function findEmail($email) : JsonResponse {
        return $this->userService->findByEmail($email)->toJson();
    }

    function findUsername($username) : JsonResponse {
        return $this->userService->findByUsername($username)->toJson();
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
