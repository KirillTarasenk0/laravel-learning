<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\Builder;
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
        private readonly ?int $customerNumber,
        private readonly ?string $timeFrom,
        private readonly ?string $timeTo
    ){}
    public function handle(): void
    {
        $customerPayments = null;
        if ($this->customerNumber) {
            $customerPayments = Customer::whereHas('payments', function (Builder $query) {
                $query->where('customers.customerNumber', '=', $this->customerNumber);
            })->get();
        }
        if ($this->timeFrom && $this->timeTo) {
            $customerPayments = Customer::whereHas('payments', function (Builder $query) {
               $query->whereBetween('payments.paymentDate', [$this->timeFrom, $this->timeTo]);
            })->get();
        }
        if ($this->customerNumber === null && $this->timeFrom === null && $this->timeTo === null) {
            $customerPayments = Customer::has('payments')->get();
        }
        Log::debug('Оплаты покупателей', [
            'оплаты' => $customerPayments
        ]);
    }
}
