<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\BussinesLogic\Zakaz;
use Illuminate\Http\Request;
use Kenvel\Tinkoff;
use PharIo\Manifest\Email;

class PaymentController extends Controller
{
    protected $tinkoff;

    public function __construct()
    {
        // $this->tinkoff = new Tinkoff(
        //     'https://securepay.tinkoff.ru/v2',
        
        //     config('tinkoff.merchant_id'),
        //     config('tinkoff.secret_key')
        // );
    }

    public function createPayment(Request $request)
    { 

        // Получаем данные из сессии
        $cart = session('cart', []);
        
        // Создаем экземпляр Zakaz
        $zakaz = new Zakaz(0); // ID не важен для подсчета
        $totalPrice = $zakaz->getTotal(); // Получаем итоговую стоимость

        // $state = $this->tinkoff->getState(6161166);

        // dd($state);

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

        

        // dd(session('cart')); //- верно

        //проверку надо сделать данных + фотка
      
        
        $amount = $request->input('amount'); 

        // if ($amount < 1) {
        //     return response()->json(['error' => 'Сумма должна быть больше или равна 1 рублю.'], 400);
        // }
        // Подготовка данных для платежа
        $paymentData = [
            
                 "TerminalKey" => "1722688466757DEMO",
                 'OrderId' => uniqid(),  // Уникальный идентификатор заказа
             'Amount' => $totalPrice , // Сумма платежа
             'Currency' => 'RUB',
             'Language' => 'ru', // Язык
             'Description' => 'tets', // Описание платежа
            'Email' => $email, // Email покупателя
            'Phone' => $number, // Телефон покупателя
             'Name' => $name, 
            'Taxation' => 'osn',
            // 'PayType' =>'T',
            

        // 'Tax' => 'vat0',
             // Налоговая система (например, 'osn' для общей системы налогообложения)
            //     'DATA' => [
            //         'Email' => $request->input('Email'), // Email покупателя
            // 'Phone' => $request->input('Phone'), // Телефон покупателя
                
            // ],
            // 'Receipt' => [
            //    'Email' => $request->input('Email'),
            //     'Phone' => $request->input('Phone'),
            //    'Taxation' => 'osn', 

            //    'items'=>[
            //        'Name'=>'cake',
            //         'Price'=>10,
            //         'Quantity' => 1,
            //         'Amount'=>1000,
            //         'Tax'=>'none',
            //    ]
               
            // ],     
                
            // 'OrderId' => uniqid(), // Уникальный идентификатор заказа
            // 'Amount' => $request->input('amount') *100, // Сумма платежа
            // 'Language' => 'ru', // Язык
            // 'Description' => $request->input('description'), // Описание платежа
            // 'Email' => $request->input('Email'), // Email покупателя
            // 'Phone' => $request->input('Phone'), // Телефон покупателя
            // 'Name' => $request->input('name'), // Имя покупателя
            // 'Taxation' => 'osn', // Налоговая система (например, 'osn' для общей системы налогообложения)
            // 'Tax' => 'osn', // Налоговая система (например, 'osn' для общей системы налогообложения)

        ];



      

    
     
    //    $items = [
    //     [
    //         'Name' => $pre['name_cake'],
    //         'Price' =>$totalPrice,
    //         'Quantity'=>$pre['quantity'],
    //         'NDS'=>'vat0',
    //     ]
    //    ];
    //     # code...
     
        // dd($items=[
        //     'Name' =>$value['name_cake'],

        // ]);
        
       
        
        // Подготовка массива товаров (если есть)
        
         $items = [
             [
                
                 'Name' => '1',
                 'Price' => 1400, // Цена в рублях
                 'Quantity' => 1,
                 'NDS' => "vat0",
        //        // 'Amount'=>1000,
        //         // Налоговая система (например, 'osn' для общей системы налогообложения)
        //          'NDS' => 'vat0', // НДС
        //          //'PaymentMethod'=>'full_prepayment',
        //          //'PaymentObject'=>'commodity',
        //          //'MeasurementUnit'=>10,
            ],
        //     // Добавьте другие товары по мере необходимости
         ];
    
        // Вызов метода paymentURL для инициализации платежа
        $paymentUrl = $this->tinkoff->paymentURL($paymentData,$items);


        if ($paymentUrl) {
            return redirect($paymentUrl); // Перенаправление на страницу оплаты
        } else {
           
            return response()->json(['error' => $this->tinkoff->error], 400); // Обработка ошибки
        }

    }

    
}

