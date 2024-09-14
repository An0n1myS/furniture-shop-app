<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\UserResource;
use App\Filters\UserFilter;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request, UserFilter $filter)
    {
        $query = User::query();
        $users = $filter->apply($query)->get();

        return UserResource::collection($users);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return new UserResource($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return new UserResource($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response(null, 204);
    }
}
