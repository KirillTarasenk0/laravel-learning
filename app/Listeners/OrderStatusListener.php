<?php

namespace App\Listeners;

use App\Events\OrderStatusEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusMail;

class OrderStatusListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderStatusEvent $event): void
    {
        Mail::to('ktarasenkotarasenko@yandex.ru')->send(new OrderStatusMail());
    }
}
