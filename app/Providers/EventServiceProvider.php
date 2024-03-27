<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\UserInfo;
use App\Observers\UserInfoObserver;
use App\Models\Customer;
use App\Observers\CustomerObserver;
use App\Events\OrderStatusEvent;
use App\Listeners\OrderStatusListener;
use App\Events\CustomerOrderStatusEvent;
use App\Listeners\CustomerOrderStatusListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CustomerOrderStatusEvent::class => [
            CustomerOrderStatusListener::class,
        ],
        OrderStatusEvent::class => [
            OrderStatusListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        UserInfo::observe(UserInfoObserver::class);
        Customer::observe(CustomerObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return true;
    }
}
