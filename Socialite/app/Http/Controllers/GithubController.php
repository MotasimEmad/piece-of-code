<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class GithubController extends Controller
{
    public function handleGithubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback() 
    {
        $githubUser = Socialite::driver('github')->user();
 
        $user = User::where('provide_id', $githubUser->id)->first();
 
        if ($user) {
            $user->update([
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken,
            ]);
        } else {
            $user = User::create([
                'name' => $githubUser->name,
                'email' => $githubUser->email,
                'password' => Hash::make($githubUser->id),
                'provide_id' => $githubUser->id,
                'token' => $githubUser->token,
                'auth_type' => 'Github'
            ]);
        }
 
        Auth::login($user);
 
        dd($user);
    }
}
