<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Services\Interfaces\AuthServiceInterface;

use Exception;

class LoginController extends Controller
{

    public function __construct(private AuthServiceInterface $authService)
    {

    }

    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string'
        ]);

        try {
            $this->authService->login(
                request('email'),
                request('password')
            );
        } catch (Exception $e) {
            return back()->withErrors([
                'password' => $e->getMessage(),
            ]);
        }

        return redirect('/');
    }
}
