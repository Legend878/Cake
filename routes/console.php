<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Schedule::command('app:clean-adresses')->daily(); // Запускаем команду ежедневно

Schedule::command('app:delete-old-orders')->daily(); // Запускаем команду ежедневно

Schedule::command('app:clean-new2')->daily(); // Запускаем команду ежедневно


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
