<?php

namespace App\Observers;

use App\Models\Customer;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Payment;

class CustomerObserver
{
    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        foreach ($customer->orders as $order) {
            $order->delete();
        }
        $customer->payments()->delete();
        $payments = Payment::where('customerNumber', $customer->customerNumber)->exists();
        $orders = Order::where('customerNumber', $customer->customerNumber)->exists();
        if (!$payments) {
            Log::info('Проверка на удаление оплат, связанных с покупателем ' . $customer->customerNumber, [
                'оплаты' => 'были удалены'
            ]);
        }
        if (!$orders) {
            Log::info('Проверка на удаление заказов, связанных с покупателем ' . $customer->customerNumber, [
                'заказы' => 'были удалены'
            ]);
        }
    }
}
