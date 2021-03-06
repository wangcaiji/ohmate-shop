<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Register' => [
            'App\Listeners\GiveFirstRegisterBeanOrNot',
            'App\Listeners\AddYourUpperInviteCount',
        ],
        'App\Events\Purchase' => [
//            'App\Listeners\GiveFirstPurchaseBeanOrNot',
            'App\Listeners\GiveYourUpperFirstPurchaseBeanOrNot',
            'App\Listeners\GiveYourUpperPurchaseFeedbackOrNot',
        ],
        'App\Events\PuanConsume' => [
            'App\Listeners\PuanConsumeBean',
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
