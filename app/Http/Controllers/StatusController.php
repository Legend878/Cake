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
    // public function __construct()
    // {

    //    $api_url    = 'https://securepay.tinkoff.ru/v2/';
    //    $terminal   = config('tinkoff.merchant_id');
    //    $secret_key = config('tinkoff.secret_key');

    //    $tinkoff = new Tinkoff($api_url, $terminal, $secret_key);

    // }
    
    public function status(){
        $api_url    = 'https://securepay.tinkoff.ru/v2/';
        $terminal   = config('tinkoff.merchant_id');
        $secret_key = config('tinkoff.secret_key');

        $tinkoff = new Tinkoff($api_url, $terminal, $secret_key);

           $status = $tinkoff->getState('000000');

           return $status;

        
    }


}   