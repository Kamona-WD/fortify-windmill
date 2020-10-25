<?php

namespace FortifyWindmill\Console;

use FortifyWindmill\FortifyWindmill;
use Illuminate\Console\Command;

class InstallCommand extends Command
{
    public $signature = 'fortmill:install';

    public $description = 'Setup FortifyWindmill routes, service providers and views';

    public function handle()
    {
        $this->callSilent('vendor:publish', ['--provider' => 'Laravel\Fortify\FortifyServiceProvider']);
        (new FortifyWindmill)->install();
        $this->info('All fortify-windmill stuf installed successfully');
        $this->comment('Please run npm install && npm run dev');
    }
}
