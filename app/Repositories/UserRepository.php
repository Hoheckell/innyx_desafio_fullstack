<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return User::paginate(15);
    }

    public function getUserByID($userId)
    {
        return User::find($userId);
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        $user->delete();
    }

    public function createUser(UserRequest $request)
    {
        $user = User::create($request->all());
        $user->save();
    }
    public function updateUser($userId, UserRequest $request)
    {
        $user = User::find($userId);
        $user->update($request->all());
        $user->save();
    }

}
