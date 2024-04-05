<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialiteProviderController extends Controller
{
    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function providerCallback($provider) {
        $providerUser = Socialite::driver($provider)->user();

        $user = User::updateOrCreate(     
        ['email' => $providerUser->email,], 
        
        [
            'name' => $providerUser->name,
            'email' => $providerUser->email,
            'password' => Hash::make($providerUser->token),
            'provider' => $provider,
        ]);
     
        Auth::login($user);
     
        return redirect(RouteServiceProvider::HOME);
    
    }
}
