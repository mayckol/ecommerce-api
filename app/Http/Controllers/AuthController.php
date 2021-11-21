<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an authentication attempt.
     *
     * @throws ValidationException
     */
    public function authenticate(Request $request)
    {

        $user = $this->userRepository->findWhere(['email' => $request->get('email')])->first();
        if (!$user || !Hash::check($request->get('password'), $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken('access_token')->plainTextToken;
        /* Using Session */
//        $credentials = $request->validate([
//            'email' => ['required', 'email'],
//            'password' => ['required'],
//        ]);
//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//            return auth()->user();
//        }
//
//        return back()->withErrors([
//            'email' => 'The provided credentials do not match our records.',
//        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
