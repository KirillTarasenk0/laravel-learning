<?php

namespace App\Listeners;

use App\Events\CustomerOrderStatusEvent;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerOrderStatusMail;

class CustomerOrderStatusListener
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
    public function handle(CustomerOrderStatusEvent $event): void
    {
        $orderNumber = request()->route('orderNumber');
        $customerNumber = Order::find($orderNumber)->customerNumber;
        $customerFirstName = Customer::find($customerNumber)->contactFirstName;
        $customerLastName = Customer::find($customerNumber)->contactLastName;
        Mail::to('ktarasenkotarasenko@yandex.ru')->send(new CustomerOrderStatusMail());
    }
}
