<?php

namespace App\Observers;

use App\Models\UserInfo;
use Illuminate\Support\Facades\Log;

class UserInfoObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(UserInfo $userInfo): void
    {
        Log::info('Данные пользователя', [
            'Имя пользоватеоя' => $userInfo->userName,
            'Фамилия пользователя' => $userInfo->userSurname,
            'Возраст пользователя' => $userInfo->userAge,
            'Email пользователя' => $userInfo->userEmail
        ]);
    }
}
