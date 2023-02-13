<?php

namespace App\Providers;

use App\Models\Home;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('homes', function ($app) {
            return new Home();
        });
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Home', Home::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // only use the Settings package if the Settings table is present in the database
        if (!\App::runningInConsole() && count(Schema::getColumnListing('homes'))) {
            $homes = Home::all();
            foreach ($homes as $key => $home)
            {
                Config::set('settings.'.$home->key, $home->value);
            }
        }
    }
}
