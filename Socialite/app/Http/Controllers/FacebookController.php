<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
    public function handleFacebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback() 
    {
        $facebookUser = Socialite::driver('facebook')->user();
 
        $user = User::where('provide_id', $facebookUser->id)->first();
 
        if ($user) {
            $user->update([
                'github_token' => $facebookUser->token,
                'github_refresh_token' => $facebookUser->refreshToken,
            ]);
        } else {
            $user = User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'password' => Hash::make($facebookUser->id),
                'provide_id' => $facebookUser->id,
                'token' => $facebookUser->token,
                'auth_type' => 'Facebook'
            ]);
        }
 
        Auth::login($user);
 
        dd($user);
    }
}
