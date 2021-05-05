<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Setting::find(1);
        $trendPosts = Post::where('trend_post_status',1)->get(['slug','title','summary','user_id']);
        View::share(['settings' => $settings, 'trendPosts' => $trendPosts]);
    }
}
