<?php


namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register Interface and Repository in here
        // You must place Interface in first place
        // If you dont, the Repository will not get readed.
        $this->app->bind(
            'App\Interfaces\Admin\PostInterface',
            'App\Repositories\Admin\PostRepository'
        );

        $this->app->bind(
            'App\Interfaces\Admin\UserInterface',
            'App\Repositories\Admin\UserRepository'
        );

        $this->app->bind(
            'App\Interfaces\Admin\CategoryInterface',
            'App\Repositories\Admin\CategoryRepository'
        );

        $this->app->bind(
            'App\Interfaces\Admin\TagInterface',
            'App\Repositories\Admin\TagRepository'
        );

        $this->app->bind(
            'App\Interfaces\HomeInterface',
            'App\Repositories\HomeRepository'
        );

        $this->app->bind(
            'App\Interfaces\CommentInterface',
            'App\Repositories\CommentRepository'
        );
    }
}
