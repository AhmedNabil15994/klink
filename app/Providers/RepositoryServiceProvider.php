<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Interfaces\DocumentInterface;
use App\Http\Repositories\DocumentRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(

            'App\Http\Interfaces\DocumentInterface',
            'App\Http\Repositories\DocumentRepository'

        );
    }
}
