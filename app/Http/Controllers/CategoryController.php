<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function sendMail()
    {
        $toEmail = 'amarinda35@yandex.ru'; // Замените на нужный адрес

        Mail::raw('Тестовое письмо', function($message) use ($toEmail) {
            $message->to($toEmail)
                    ->subject('Тест');
        });

        return 'Письмо успешно отправлено!';
    }
}
