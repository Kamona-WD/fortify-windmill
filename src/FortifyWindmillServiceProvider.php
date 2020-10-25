<?php

namespace FortifyWindmill;

use FortifyWindmill\Console\InstallCommand;
use Illuminate\Support\ServiceProvider;

class FortifyWindmillServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([
            InstallCommand::class
        ]);
    }
}
