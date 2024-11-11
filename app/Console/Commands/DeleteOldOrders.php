<?php

namespace App\Console\Commands;


use Illuminate\Support\Facades\Storage;

use Illuminate\Console\Command;
use App\Models\OrderUser; // Убедитесь, что путь к модели правильный
use App\Models\Adress;
use Illuminate\Support\Carbon;
use App\Models\Fabric;


class DeleteOldOrders extends Command
{


     protected $signature = 'app:delete-old-orders';
    protected $description = 'Удаляет прошедшие заказы';

    public function handle()
    {
        // Удаляем старые заказы
        $oldOrders = Fabric::with(['orderUser.address']) // Загружаем связанные данные
        ->where('updated_at', '<', Carbon::now()->subDays(60)) // Условие для фильтрации
        ->get();
    
        foreach ($oldOrders as $fabric) {
            // Удаляем фото из поля photo_path, если оно существует
            if ($fabric->photo_path) {
                Storage::delete($fabric->photo_path);
            }
    
            // Проверяем наличие OrderUser
            if ($fabric->orderUser) {
                $this->info("Обрабатываем заказ ID {$fabric->orderUser->id}");
    
                // Удаляем все записи в order_fabric, связанные с этим заказом
                Fabric::where('order_id', $fabric->orderUser->id)->delete();
    
                // Проверяем наличие файла
                if (isset($fabric->orderUser->file_user)) {
                    $userFile = $fabric->orderUser->file_user;
    
                    if ($userFile && Storage::exists($userFile)) { 
                        Storage::delete($userFile); 
                        $this->info("Файл пользователя ID {$userFile} удален.");
                    }
                }
    
                // Удаляем сам заказ
                $fabric->orderUser->delete();
                $this->info("Заказ ID {$fabric->orderUser->id} удален.");
            }
    
            // Удаляем адрес, если он существует
            if ($fabric->orderUser && $fabric->orderUser->address) {
                $addressId = $fabric->orderUser->address->id;
                
                $fabric->orderUser->address->delete();
                $this->info("Адрес ID {$addressId} удален.");
            }
    
            // Удаляем сам fabric
            $fabric->delete();
            $this->info("Fabric ID {$fabric->id} удален.");
        }
    
        $this->info('Все старые заказы и связанные данные удалены.');
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:delete-old-orders';

    // /**
    //  * The console command description.
    //  *
    //  * @var string
    //  */
    // protected $description = 'Command description';

    // /**
    //  * Execute the console command.
    //  */
    // public function handle()
    // {
    //     //
    // }
}
