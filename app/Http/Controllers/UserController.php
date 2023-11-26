<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AccessControl;
use App\Http\Resources\UserResource;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware(AccessControl::class);
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAllUsers();
        return response()->json(UserResource::collection($users), 200);
    }

    public function show($id)
    {
        $user = $this->userRepository->getUserByID($id);
        return response()->json(UserResource::make($user), 200);
    }
}
