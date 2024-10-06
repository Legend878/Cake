<?php

namespace App\Console\Commands;
use Carbon\Carbon; // Импортируем
use Illuminate\Console\Command;
use App\Models\Fabric;
class CleanNew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $timeLimit = Carbon::now()->subMinutes(180); // Устанавливаем лимит времени
        $deletedCount = Fabric::where('status', 'NEW')
            ->where('created_at', '<', $timeLimit)
            ->delete(); // Удаляем старые заказы

        // $this->info("Удалено $deletedCount старых заказов.");

    }
}
