<?php

namespace App\Service;

use App\Models\User;
use App\Notifications\SendPasswordNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialService
{
    public function saveSocialData($socialUser): User|null
    {
        $user = User::where('email', $socialUser->getEmail())->first();

        if (!$user) {
            $user = new User();
            $user->name = $socialUser->getName();
            $user->email = $socialUser->getEmail();

            // Генерируем случайный безопасный пароль
            $randomPassword = Str::random(16);
            $user->password = Hash::make($randomPassword);
            $user->save();

            $user->assignRole('user');

            // Отправляем уведомление с паролем
            $user->notify(new SendPasswordNotification($randomPassword));
        }

        return $user;
    }
}
