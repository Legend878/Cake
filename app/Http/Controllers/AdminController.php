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


    // Get All orders
    $orders = Fabric::all();



   


    foreach ($orders as $order) {

        //Get status order user
        
        $status = $this->tinkoff->getState($order->number_tranzak);
        // // if status change AUTHORIZED, update status in database
        if ($status === 'AUTHORIZED' && $order->status_order !== 'AUTHORIZED') {

            $order->status_order = 'AUTHORIZED'; //  update status
            $order->save(); //save change
        }
    }
    Carbon::setLocale('ru');
    // get only order with status AUTHORIZED and CONFIRMED
    $authorizedOrders = Fabric::where('status_order', 'AUTHORIZED')->with(['orderUser'])->paginate(10);  //->with(['user','product','delivery','time'])

    $groupedAuthorizedOrders = $authorizedOrders->groupBy(function ($order) {
        return $order->orderID_bank. '|' .$order->status_order .'|'.Carbon::parse($order->orderUser->date)->translatedFormat('l, d F Y') ;
    });
    
 


    

    return view('admin', [
        'groupedAuthorizedOrders' => $groupedAuthorizedOrders,
        'authorizedOrders' => $authorizedOrders, // with pagination get object
    ]);
}

        public function confirmorder(Request $request,$orderID_bank){
           
    $api_url = 'https://securepay.tinkoff.ru/v2/';
    $terminal = config('tinkoff.merchant_id');
    $secret_key = config('tinkoff.secret_key');


    $userEmail = $request->email;

    $tinkoff = new Tinkoff($api_url, $terminal, $secret_key);

       // Find order  orderID_bank
       $order = Fabric::where('orderID_bank', $orderID_bank)->get(); 
       
       foreach ($order as $orders) {
         // Check if the order exists
           if ($orders->status_order === 'AUTHORIZED') {
            // Confirming the order status from Tinkoff API
            $status = $tinkoff->confirmPayment($orders->number_tranzak);

            // We are updating the status for all items in this order
                    // Set the CONFIRMED status for each product
                    $orders->status_order = 'CONFIRMED'; 
                    $orders->save(); // save change
                
            }
           
       }
    
            // Send a notification to the user
            Mail::to($userEmail)->send(new OrderStatusUpdate($orderID_bank, 'Принят'));


            return redirect()->back();
                         
        }

        public function rejectorder(Request $request,$orderID_bank){    
            $api_url = 'https://securepay.tinkoff.ru/v2/';
            $terminal = config('tinkoff.merchant_id');
            $secret_key = config('tinkoff.secret_key');

            $userEmail = $request->email;

            $tinkoff = new Tinkoff($api_url, $terminal, $secret_key);
        
               //Find order  orderID_bank
               $order = Fabric::where('orderID_bank', $orderID_bank)->get(); 
               
               foreach ($order as $orders) {
                 // Check if the order exists
                   if ($orders->status_order === 'AUTHORIZED') {
            // Confirming the order status from Tinkoff API
            $status = $tinkoff->cencelPayment($orders->number_tranzak);
        
                   // We are updating the status for all items in this order
                    // Set the REJECTED status for each product
                            $orders->status_order = 'REJECTED'; 
                            $orders->save(); // Сохраняем изменения для каждого товара
                        
                    }
                   
               }
            
            // Send a notification to the user
            Mail::to($userEmail)->send(new OrderStatusUpdate($orderID_bank, 'Отклонен'));
        
        
                    return redirect()->back();
                                 
                }

public function confirmed(){
// get all orders
$orders = Fabric::all();





// set language
Carbon::setLocale('ru');

    // get only order with status AUTHORIZED and CONFIRMED
    $confirmOrders = Fabric::where('status_order', 'CONFIRMED')
    ->whereHas('orderUser', function ($query) {
        $query->where('date', '>=', Carbon::today()); // Filter by date in OrderUser
    })
    ->with(['orderUser']) //Loading related data
    ->paginate(10);

// Grouping orders
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

// Sort groups by date
$sortedGroupedConfirmOrders = $groupedConfirmOrders->sortBy(function ($group) {
    return Carbon::parse($group->first()->orderUser->date);
});

// Return sorted groups to the view
return view('confirmed', [
    'sortedGroupedConfirmOrders' => $sortedGroupedConfirmOrders, // Using sorted groups
    'confirmOrders' => $confirmOrders, // We also pass an object with pagination
]);
}
}
