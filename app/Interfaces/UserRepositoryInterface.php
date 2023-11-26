<?php

namespace App\Interfaces;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UserRequest;

interface UserRepositoryInterface
{
    public function getAllUsers();
    public function getUserByID($userId);
    public function deleteUser($userId);
    public function createUser(UserRequest $request);
    public function updateUser($userId, UserRequest $request);

}
