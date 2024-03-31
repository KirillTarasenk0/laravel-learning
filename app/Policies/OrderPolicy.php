<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(Customer $customer): Response
    {
        return $customer->creditLimit > 10000
            ? Response::allow()
            : Response::deny('Ваш creditLimit меньше 10000. Вы не можете создать новый заказ.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Customer $customer, Order $order): Response
    {
        return $customer->country === 'USA'
            ? Response::allow()
            : Response::deny('Только пользователи из США могут редактировать свои заказы');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Customer $customer, Order $order): Response
    {
        return $customer->country === 'USA'
            ? Response::allow()
            : Response::deny('Только пользователи из США могут удалять свои заказы');
    }
}
