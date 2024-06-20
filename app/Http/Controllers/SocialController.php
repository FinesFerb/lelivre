<?php

namespace App\Http\Controllers;

use App\Service\SocialService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function vk(): RedirectResponse
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callbackVk(): RedirectResponse
    {
        $user = Socialite::driver('vkontakte')->stateless()->user();
        $objSocial = new SocialService();
        if($user = $objSocial->saveSocialData($user)){
            Auth::login($user);
            return redirect()->route('welcome');
        }
        return back(400)->withErrors(['errors' => 'Failed to authenticate']);
    }

    public function google(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle(): RedirectResponse
    {
        $user = Socialite::driver('google')->stateless()->user();
        $objSocial = new SocialService();
        if($user = $objSocial->saveSocialData($user)){
            Auth::login($user);
            return redirect()->route('welcome');
        }
        return back(400)->withErrors(['errors' => 'Failed to authenticate']);
    }
}
