<?php

namespace YogiGr\TodoList\Listeners;

use App\Events\MenuCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddMenu
{
    /**
     * Handle the event.
     */
    public function handle(MenuCreated $event): void
    {
        $event->menu->push(
            [
                'url' => route('todo.index'),
                'label' => __('Todo'),
                'active' => request()->segment(1) == 'todo'
            ]
        );
    }
}
