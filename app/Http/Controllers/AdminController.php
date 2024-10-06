<?php

namespace App\Http\Controllers;

use App\Models\OrderUser;
use App\Models\Fabric;
use Carbon\Carbon;
use Kenvel\Tinkoff;
use Illuminate\Http\Request;
use App\Mail\OrderStatusUpdate; // Импорт класса OrderStatusUpdate
use Illuminate\Support\Facades\Mail; // Импорт фасада Mail

class AdminController extends Controller
{
    

        private $tinkoff;
        public function __construct()
        {
            $api_url = 'https://securepay.tinkoff.ru/v2/';
            $terminal = config('tinkoff.merchant_id');
            $secret_key = config('tinkoff.secret_key');

            $this->tinkoff = new Tinkoff($api_url, $terminal, $secret_key);

        }

        public function checkPaymentStatus(){


    // Получаем все заказы
    $orders = Fabric::all();



   


    foreach ($orders as $order) {
        // Получаем статус заказа из API Тинькофф
        $status = $this->tinkoff->getState($order->number_tranzak);
        // // Если статус изменился на AUTHORIZED, обновляем статус в базе данных
        if ($status === 'AUTHORIZED' && $order->status_order !== 'AUTHORIZED') {

            $order->status_order = 'AUTHORIZED'; // Обновляем статус
            $order->save(); // Сохраняем изменения
        }
    }
    Carbon::setLocale('ru');
    // Получаем только заказы со статусом AUTHORIZED и CONFIRMED
    $authorizedOrders = Fabric::where('status_order', 'AUTHORIZED')->with(['orderUser'])->paginate(10);  //->with(['user','product','delivery','time'])

    $groupedAuthorizedOrders = $authorizedOrders->groupBy(function ($order) {
        return $order->orderID_bank. '|' .$order->status_order .'|'.Carbon::parse($order->orderUser->date)->translatedFormat('l, d F Y') ;
    });
    
 


    

    return view('admin', [
        'groupedAuthorizedOrders' => $groupedAuthorizedOrders,
        'authorizedOrders' => $authorizedOrders, // Передаем также объект с пагинацией
    ]);
}

        public function confirmorder(Request $request,$orderID_bank){
           
    $api_url = 'https://securepay.tinkoff.ru/v2/';
    $terminal = config('tinkoff.merchant_id');
    $secret_key = config('tinkoff.secret_key');


    $userEmail = $request->email;

    $tinkoff = new Tinkoff($api_url, $terminal, $secret_key);

       // Найти заказ по orderID_bank
       $order = Fabric::where('orderID_bank', $orderID_bank)->get(); 
       
       foreach ($order as $orders) {
         // Проверяем, существует ли заказ
           if ($orders->status_order === 'AUTHORIZED') {
            // Подтверждаем статус заказа из API Тинькофф
            $status = $tinkoff->confirmPayment($orders->number_tranzak);

            // Обновляем статус для всех товаров в этом заказе
                    // Устанавливаем статус CONFIRMED для каждого товара
                    $orders->status_order = 'CONFIRMED'; 
                    $orders->save(); // Сохраняем изменения для каждого товара
                
            }
           
       }
    
            // Отправляем уведомление пользователю
            Mail::to($userEmail)->send(new OrderStatusUpdate($orderID_bank, 'Принят'));


            return redirect()->back();
                         
        }

        public function rejectorder(Request $request,$orderID_bank){    
            $api_url = 'https://securepay.tinkoff.ru/v2/';
            $terminal = config('tinkoff.merchant_id');
            $secret_key = config('tinkoff.secret_key');

            $userEmail = $request->email;

            $tinkoff = new Tinkoff($api_url, $terminal, $secret_key);
        
               // Найти заказ по orderID_bank
               $order = Fabric::where('orderID_bank', $orderID_bank)->get(); 
               
               foreach ($order as $orders) {
                 // Проверяем, существует ли заказ
                   if ($orders->status_order === 'AUTHORIZED') {
                    // Подтверждаем статус заказа из API Тинькофф
                    $status = $tinkoff->cencelPayment($orders->number_tranzak);
        
                    // Обновляем статус для всех товаров в этом заказе
                            // Устанавливаем статус CONFIRMED для каждого товара
                            $orders->status_order = 'REJECTED'; 
                            $orders->save(); // Сохраняем изменения для каждого товара
                        
                    }
                   
               }
            
                    // Отправляем уведомление пользователю
                    Mail::to($userEmail)->send(new OrderStatusUpdate($orderID_bank, 'Отклонен'));
        
        
                    return redirect()->back();
                                 
                }

public function confirmed(){
// Получаем все заказы
$orders = Fabric::all();





// Устанавливаем локализацию на русский
Carbon::setLocale('ru');

// Получаем только заказы со статусом AUTHORIZED и CONFIRMED
$confirmOrders = Fabric::where('status_order', 'CONFIRMED')
    ->whereHas('orderUser', function ($query) {
        $query->where('date', '>=', Carbon::today()); // Фильтруем по дате в OrderUser
    })
    ->with(['orderUser']) // Загружаем связанные данные
    ->paginate(10);

// Группируем заказы
$groupedConfirmOrders = $confirmOrders->groupBy(function ($order) {
    return $order->orderUser->file_user . '|' .
           $order->orderUser->comment . '|' .
           $order->orderUser->delivery . '|' .
           $order->orderUser->time_id . '|' .
           $order->status_order . '|' .
           Carbon::parse($order->orderUser->date)->translatedFormat('l, d F Y')  . '|' .
           $order->orderUser->user_id . '|' .
           $order->orderUser->created_at->format('Y-m-d');
});

// Сортируем группы по дате
$sortedGroupedConfirmOrders = $groupedConfirmOrders->sortBy(function ($group) {
    return Carbon::parse($group->first()->orderUser->date);
});

// Возвращаем отсортированные группы в представление
return view('confirmed', [
    'sortedGroupedConfirmOrders' => $sortedGroupedConfirmOrders, // Используем отсортированные группы
    'confirmOrders' => $confirmOrders, // Передаем также объект с пагинацией
]);
}
}
