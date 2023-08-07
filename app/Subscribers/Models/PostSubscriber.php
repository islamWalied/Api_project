<?php

namespace App\Subscribers\Models;



use App\Events\Models\post\PostCreated;
use App\Events\Models\post\PostDeleted;
use App\Events\Models\post\PostUpdated;
use App\Listeners\DeletedSuccessfullPost;
use App\Listeners\SendSuccessfullPost;
use App\Listeners\UpdatedSuccessfullPost;
use Illuminate\Events\Dispatcher;

class PostSubscriber
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(PostCreated::class,SendSuccessfullPost::class);
        $events->listen(PostUpdated::class,UpdatedSuccessfullPost::class);
        $events->listen(PostDeleted::class,DeletedSuccessfullPost::class);
    }
}
