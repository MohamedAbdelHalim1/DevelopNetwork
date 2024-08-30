<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
        ]);

        return $this->authService->register($validated);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'phone_number' => 'required|string',
            'password' => 'required|string',
        ]);

        return $this->authService->login($validated);
    }

    public function verifyCode(Request $request)
    {
        $validated = $request->validate([
            'phone_number' => 'required|string',
            'code' => 'required|string',
        ]);

        return $this->authService->verifyCode($validated['phone_number'], $validated['code']);
    }
}
