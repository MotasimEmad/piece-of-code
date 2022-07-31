<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{
    public function handleGoogleRedirect() 
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() 
    {
            $googleUser = Socialite::driver('google')->user();
            // $userExists = User::where('oauth_id', '=' ,$user->id)->where('oauth_type', '=', 'google')->first();

            $user = User::where('provide_id', $googleUser->id)->first();
            if ($user) {
                dd($user);
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make($googleUser->id),
                    'provide_id' => $googleUser->id,
                    'token' => $googleUser->token,
                    'auth_type' => 'Google'
                ]);
            }
    
            dd($user);
            Auth::login($user);
            // if ($userExists) {
            //     dd($userExists);
            //     Auth::login($userExists);
            //     return redirect()->route('home');
            // } else {
            //     $newUser = User::create([
            //         'name' => $user->name,
            //         'email' => $user->email,
            //         'password' => Hash::make($user->id),
            //         'oauth_id' => $user->id,
            //         'oauth_type' => 'google'
            //     ]);

            //     dd($newUser);


            //     Auth::login($newUser);
            //     return redirect()->route('home');
            // }
    }
}
