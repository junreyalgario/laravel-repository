<?php

namespace Algario;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        // Register the commands to create repository interface and facades
        $this->commands([
            Algario\Console\MakeRepositoryConcreteCommand::class,
            Algario\Console\MakeServiceInterfaceCommand::class,
            Algario\Console\MakeServiceFacadeCommand::class
        ]);
    }
}