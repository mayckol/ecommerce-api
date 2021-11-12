<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Repositories\UserRolesRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Prettus\Validator\Exceptions\ValidatorException;

class UserController extends Controller
{
    private UserRepository $userRepository;

    private UserRolesRepository $userRolesRepository;

    public function __construct(
        UserRepository      $userRepository,
        UserRolesRepository $userRolesRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->userRolesRepository = $userRolesRepository;
    }

    /**
     * Handle an authentication attempt.
     *
     * @throws ValidatorException
     */
    public function store(Request $request): JsonResponse
    {

        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'cpf' => 'required|size:11|unique:users,cpf',
            'password' => 'required', Password::min(8),
            'state' => 'required|min:2|max:2',
            'city' => 'required|min:2|max:50',
            'street' => 'nullable',
            'number' => 'nullable|numeric',
            'complement' => 'nullable|numeric',
            'phone' => 'required|size:11',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request['password']);
        $user = $this->userRepository->create($data);
        $this->userRolesRepository->create([
            'user_id' => $user->id,
            'role_id' => config('role.client'),
        ]);

        return response()->json($request->all(), 201);
    }
}
