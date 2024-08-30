<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Interfaces\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    public function register(array $data)
    {
        $verificationCode = Str::random(6);

        $user = User::create([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'verification_code' => $verificationCode,
            'is_verified' => false,
        ]);


        return $user;
    }

    public function login(array $credentials)
    {
        if (auth()->attempt(['phone_number' => $credentials['phone_number'], 'password' => $credentials['password']])) {
            $user = auth()->user();
            if ($user->is_verified) {
                $token = $user->createToken('Personal Access Token')->plainTextToken;
                return ['token' => $token, 'user' => $user];
            } else {
                return ['error' => 'Account not verified.'];
            }
        }
        return ['error' => 'Invalid credentials.'];
    }

    public function verifyCode(string $phoneNumber, string $code)
    {
        $user = User::where('phone_number', $phoneNumber)->first();

        if ($user && $user->verification_code === $code) {
            $user->update(['is_verified' => true]);
            return ['message' => 'Account verified successfully.'];
        }

        return ['error' => 'Invalid verification code.'];
    }
}
