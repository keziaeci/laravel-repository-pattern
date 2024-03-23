<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Requests\PostUserRequest;

class RegisterController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }
    function __invoke(PostUserRequest $request) {
        $data = $request->validated();
        return $this->userService->create($data)->toJson();
    }
}
