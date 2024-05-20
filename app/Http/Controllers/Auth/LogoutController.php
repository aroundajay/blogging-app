<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Services\Interfaces\AuthServiceInterface;

class LogoutController extends Controller
{
    public function __construct(private AuthServiceInterface $authService)
    {

    }

    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $this->authService->logout();

        return redirect()->back();
    }
}
