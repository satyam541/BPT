<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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
        Relation::morphMap([
            'category' => 'App\Models\Category',
            'topic'    => 'App\Models\Topic',
            'course'   => 'App\Models\Course',
            'location' => 'App\Models\Location',
            'venue'    => 'App\Models\Venue',
            'article'  => 'App\Models\Article',
            
        ]);
    }
}
