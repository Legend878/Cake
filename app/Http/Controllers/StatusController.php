<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\BussinesLogic\Zakaz;
use Illuminate\Http\Request;
use Kenvel\Tinkoff;
use PharIo\Manifest\Email;


class StatusController extends Controller
{

    
    protected $tinkoff;

    public function __construct()
    // {
    //     $this->tinkoff = new Tinkoff(
    //         'https://securepay.tinkoff.ru/v2/GetState',
        
    //         config('tinkoff.merchant_id'),
    //         config('tinkoff.secret_key')
    //     );
    }

    public function Status()
    { 

        

    
        $paymentData = [
            
                 "TerminalKey" => "1722688466757DEMO",
                 'OrderId' => "66c36f0a9e5a7",  // Уникальный идентификатор заказа
                 'IP' => "92.101.184.60",
        ];
            

      
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
        $paymentUrl = $this->tinkoff->getState($paymentData);


        return dd($paymentUrl);

    }

    
}



