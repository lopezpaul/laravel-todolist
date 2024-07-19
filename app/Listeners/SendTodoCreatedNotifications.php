<?php

namespace App\Listeners;

use App\Events\TodoCreated;
use App\Models\User;
use App\Notifications\NewTodo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTodoCreatedNotifications implements ShouldQueue
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
    public function handle(TodoCreated $event): void
    {
        foreach (User::whereNot('id', $event->todo->user_id)->cursor() as $user) {
            $user->notify(new NewTodo($event->todo));
        }
    }
}
