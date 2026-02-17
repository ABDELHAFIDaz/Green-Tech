<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Controller\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\session;

class AuthServerice{

    public function register($data)
    {
        // to check if the email is already been taken

        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['name']),
            'role' => 'client'
        ]);

        if($newUser){
            Auth::login($newUser);
        }

    }

    public function login($credentials)
    {
        if(Auth::attempt($credentials)){
            
            session()->regenerate();
            // Auth::login(User::where('email', $credentials['email'])->get());
            Auth::user();
        }
    }
}