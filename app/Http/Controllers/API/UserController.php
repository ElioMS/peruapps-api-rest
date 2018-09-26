<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Http\Traits\UserTrait;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use UserTrait;

    private $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository;
    }

    public function index()
    {
        $users = $this->user->all();
        return new UserCollection($users);
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = $this->user->create($request->all());
        return $user->makeHidden('end_date');
    }

    public function show($id)
    {
        $user = $this->user->find($id);

        if (!$user) {
            return response()->json('User not found', 404);
        }

        return new UserResource($user);
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validator($request);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = $this->user->update($request->all(), $id);
        return $user->makeHidden('admission_date');
    }

    public function destroy($id)
    {
        $this->user->delete($id);
        return response()->json('Usuario eliminado', 204);
    }
}
