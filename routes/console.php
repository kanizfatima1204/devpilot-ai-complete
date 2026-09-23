<?php
use Illuminate\Support\Facades\Artisan;
Artisan::command('devpilot:about', function () {
    $this->info('DevPilot AI — Laravel + Vue development employee.');
})->purpose('Show DevPilot AI information');
