<?php
namespace App\Services;

use App\Interfaces\AuthRepositoryInterface;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(array $data)
    {
        $user = $this->authRepository->register($data);
        return response()->json([
            'Flag' => 'Success',
            'Message' => 'User registered successfully. Check your phone for a verification code.',
            'Data' => $user
        ]);
    }

    public function login(array $credentials)
    {
        $result = $this->authRepository->login($credentials);
        return response()->json($result);
    }

    public function verifyCode(string $phoneNumber, string $code)
    {
        $result = $this->authRepository->verifyCode($phoneNumber, $code);
        return response()->json($result);
    }
}
