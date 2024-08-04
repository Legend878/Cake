<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function initiatePayment(Request $request)
    {
        // Данные для тестового платежа
        $data = [
            "TerminalKey" => "1722688466757DEMO",
            "Amount" => 1000, // Сумма в копейках (например, 1000 = 10 рублей)
            "Currency" => "RUB",
            "OrderId" => uniqid(), // Уникальный идентификатор заказа
            "Description" => "Тестовый платеж",
            "SuccessURL" => "https://securepay.tinkoff.ru/html/payForm/success.html",
            "FailURL" => "https://securepay.tinkoff.ru/html/payForm/fail.html"
        ];

        // Отправка POST-запроса
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post('https://securepay.tinkoff.ru/v2/Init', $data);

        // Обработка ответа
        $responseData = $response->json();

        // Проверка статуса ответа
        if ($responseData['Success']) {
            // Перенаправление пользователя на страницу оплаты
            return redirect($responseData['PaymentURL']);
        } else {
            // Обработка ошибок
            return back()->withErrors(['message' => 'Ошибка: ' . $responseData['Message']]);
        }
    }
}
