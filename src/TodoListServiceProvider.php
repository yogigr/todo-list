<?php

namespace YogiGr\TodoList;

use Illuminate\Support\ServiceProvider;

class TodoListServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        //migrations
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        //views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'todo');
    }
}
