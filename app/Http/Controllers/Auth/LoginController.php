<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
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
    public function __invoke(LoginRequest $request)
    {
        try {
            $this->authService->login(
                $request->email,
                $request->password
            );
        } catch (Exception $e) {
            return back()->withErrors([
                'password' => $e->getMessage(),
            ]);
        }

        return redirect(route('posts.index'));
    }
}
