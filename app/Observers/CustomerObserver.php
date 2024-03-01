<?php

namespace App\Observers;

use App\Models\Customer;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Payment;

class CustomerObserver
{
    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        $customerNumber = request()->route('customerNumber');
        $payments = Payment::where('customerNumber', $customerNumber)->exists();
        $orders = Order::where('customerNumber', $customerNumber)->exists();
        if (!$payments) {
            Log::info('Проверка на удаление оплат, связанных с покупателем ' . $customerNumber, [
                'оплаты' => 'были удалены'
            ]);
        }
        if (!$orders) {
            Log::info('Проверка на удаление заказов, связанных с покупателем ' . $customerNumber, [
                'заказы' => 'были удалены'
            ]);
        }
    }
    /**
     * Handle the Customer "restored" event.
     */
    public function restored(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     */
    public function forceDeleted(Customer $customer): void
    {
        //
    }
}
