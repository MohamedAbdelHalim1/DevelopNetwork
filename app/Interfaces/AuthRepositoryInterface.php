<?php
namespace App\Interfaces;

interface AuthRepositoryInterface
{
    public function register(array $data);
    public function login(array $credentials);
    public function verifyCode(string $phoneNumber, string $code);
}