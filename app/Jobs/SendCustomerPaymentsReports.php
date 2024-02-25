<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;

class SendCustomerPaymentsReports implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public function __construct(
        private readonly int|null $customerNumber,
        private readonly string|null $timeFrom,
        private readonly string|null $timeTo
    ){}
    public function handle(): void
    {
        $customerPayments = null;
        if ($this->customerNumber) {
            $customerPayments = Customer::join('payments', 'customers.customerNumber', '=', 'payments.customerNumber')
                ->where('customers.customerNumber', '=', $this->customerNumber)
                ->get();
        }
        if ($this->timeFrom && $this->timeTo) {
            $customerPayments = Customer::join('payments', 'customers.customerNumber', '=', 'payments.customerNumber')
                ->whereBetween('payments.paymentDate', [$this->timeFrom, $this->timeTo])
                ->get();
        }
        if ($this->customerNumber === null && $this->timeFrom === null && $this->timeTo === null) {
            $customerPayments = Customer::join('payments', 'customers.customerNumber', '=', 'payments.customerNumber')
                ->get();
        }
        Log::debug('Оплаты покупателей', [
            'оплаты' => $customerPayments
        ]);
    }
    /*public function handle(): void
    {
        Log::debug('Оплаты покупателей', [
            'оплаты' => $this->customer
        ]);
    }*/
}
