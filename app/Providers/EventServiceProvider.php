<?php

namespace App\Providers;

use App\Events\Models\post\PostCreated;
use App\Events\Models\post\PostDeleted;
use App\Events\Models\post\PostUpdated;
use App\Listeners\SendSuccessfullPost;
use App\Subscribers\Models\PostSubscriber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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

//        PostCreated::class => [
//          SendSuccessfullPost::class,
//        ],

    ];
    protected $subscribe =[
        PostSubscriber::class,
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
