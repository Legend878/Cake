<?php

namespace App\Http\Controllers;

use App\BussinesLogic\OrderUsers;
use Illuminate\Support\Facades\Log;
use App\BussinesLogic\Zakaz;
use Illuminate\Http\Request;
use Kenvel\Tinkoff;
use PharIo\Manifest\Email;

class PaymentController extends Controller
{
    protected $tinkoff;

    public $status;

    //  public function __construct()
    //  {

       

    //        $this->tinkoff = new Tinkoff(
    //     'https://securepay.tinkoff.ru/v2',
        
    //       config('tinkoff.merchant_id'),
    //      config('tinkoff.secret_key')
    //   );
    //  }

    public function createPayment(Request $request)
     { 
    //     $api_url    = 'https://securepay.tinkoff.ru/v2/';
    //     $terminal   = config('tinkoff.merchant_id');
    //     $secret_key = config('tinkoff.secret_key');

    //     $tinkoff = new Tinkoff($api_url, $terminal, $secret_key);

        // // Получаем данные из сессии
        // $cart = session('cart', []);
        
        // Создаем экземпляр Zakaz
        // $zakaz = new Zakaz(0); // ID не важен для подсчета
        // $totalPrice = $zakaz->getTotal(); // Получаем итоговую стоимость
        
        $name = $request->name;
        $lastname = $request->lastname;
        $email = $request->Email;
        $number = $request->number_phone;
        $delivery = $request->delivery;
        $street = $request->street;
        $kv = $request->kv;
        $up = $request->up;
        $padik = $request->padik;
        $date = $request->date2;
        $time = $request->Time;
        $comment = $request->comment;

         try{
            $Order = new OrderUsers($name,$lastname,$email,$number,$delivery,$street,$kv,$up,$padik,$date,$time,$comment);
            echo $Order->getName().'<br>';
            echo $Order->Getlastname().'<br>';
            echo $Order->GetEmail().'<br>';
            echo $Order->GetNumber().'<br>';
         }catch(\Exception $e){
        
            return back()->withErrors(['error'=>$e->getMessage()]);
        }
    

        //проверку надо сделать данных + фотка
      
       
        // Подготовка данных для платежа
        // $payment = [
        //     'OrderId'       => uniqid(),        //Ваш идентификатор платежа
        //     'Amount'        => $totalPrice,           //сумма всего платежа в рублях
        //     'Language'      => 'ru',            //язык - используется для локализации страницы оплаты
        //     'Description'   => $comment,   //описание платежа
        //     'Email'         => $email,//email покупателя
        //     'Phone'         => $number,   //телефон покупателя
        //     'Name'          => $name, //Имя покупателя
        //     'Taxation'      => 'osn'     //Налогооблажение
           
        // ];

        // foreach($payment as $id=>$elem){
        //     echo $id.'='.$elem.'<br>'; 
        // }
        // // Подготовка массива товаров (если есть)
       
        //  $items = [
        //      [
                
        //          'Name' => '1',
        //          'Price' => $totalPrice, // Цена в рублях
        //          'Quantity' => 1,
        //          'NDS' => "vat0",
      
        //     ],
      
        //  ];

        //  $paymentURL = $tinkoff->paymentURL($payment, $items);

        //  if(!$paymentURL){
        //     echo($tinkoff->error);
        //   } else {
        //     $payment_id = $tinkoff->payment_id;
        //     // return redirect($result['payment_url']);
        //   }

      
        //  if ($paymentURL) {
        //      return redirect($paymentURL); // Перенаправление на страницу оплаты
        //   } else {
           
        //       return response()->json(['error' => $this->tinkoff->error], 400); // Обработка ошибки
        //   }
    
    }

  

 


}
    

    


