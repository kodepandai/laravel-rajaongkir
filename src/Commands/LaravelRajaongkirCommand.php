<?php

namespace Kodepintar\LaravelRajaongkir\Commands;

use Illuminate\Console\Command;

class LaravelRajaongkirCommand extends Command
{
    public $signature = 'laravel-rajaongkir';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
