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

    /**
     * Handle the User "updated" event.
     */
    public function updated(UserInfo $userInfo): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(UserInfo $userInfo): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(UserInfo $userInfo): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(UserInfo $userInfo): void
    {
        //
    }
}
