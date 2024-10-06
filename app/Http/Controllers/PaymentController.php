<?php

namespace App\Http\Controllers;



use App\BussinesLogic\OrderUsers;
// use Illuminate\Support\Facades\Log;
use App\BussinesLogic\Zakaz;
// use Carbon\Carbon;
use Illuminate\Http\Request;
// use Kenvel\Tinkoff;
// use PharIo\Manifest\Email;
// use App\Models\DateOrder;
// use App\Models\OrderUser;
// use PhpParser\Node\Stmt\Catch_;

class PaymentController extends Controller
{
    protected $tinkoff;

    public $status;

    

    public function createPayment(Request $request)
     { 

         // Получаем данные из сессии
         $cart = session('cart', []);
        //  Создаем экземпляр Zakaz
         $zakaz = new Zakaz(0,0,'0','0'); // ID не важен для подсчета
         $totalPrice = $zakaz->getTotal(); // Получаем итоговую стоимость
        
         $validatedData = $request->validate([
          'name' => 'required|string|max:100', // Имя обязательно, строка, максимум 255 символов
          'lastname' => 'required|string|max:100', // Фамилия обязательно, строка, максимум 255 символов
          'Email' => 'required|email|max:150', // Электронная почта обязательна, должна быть корректной и максимум 255 символов
          'number_phone' => 'required|string|max:12', // Номер телефона обязателен, строка, максимум 15 символов
          'delivery' => 'required|string|max:160', // Доставка обязательна, строка, максимум 255 символов
          'street' => 'nullable|string|max:255', // Улица обязательна, строка, максимум 255 символов
          'kv' => 'nullable|string|max:10', // Квартира может быть пустой, строка, максимум 10 символов
          'up' => 'nullable|string|max:10', // Подъезд может быть пустым, строка, максимум 10 символов
          'padik' => 'nullable|string|max:10', // Падик может быть пустым, строка, максимум 10 символов
          'date' => 'required|date', // Дата обязательна и должна быть корректной датой
          'time' => 'required|string', // Время обязательно и должно соответствовать формату "чч:мм"
          'Cakefoto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Файл может быть пустым, должен быть изображением и не превышать 2MB
          'comment' => 'nullable|string|max:500', // Комментарий может быть пустым, строка, максимум 500 символов
      ]);
  
      // Если валидация прошла успешно, вы можете продолжить обработку данных.
      // Например:
      $name = $validatedData['name'];
      $lastname = $validatedData['lastname'];
      $email = $validatedData['Email'];
      $number = $validatedData['number_phone'];
      $delivery = $validatedData['delivery'];
      $street = $validatedData['street'];
      $kv = $validatedData['kv'];
      $up = $validatedData['up'];
      $padik = $validatedData['padik'];
      $date = $validatedData['date'];
      $time = $validatedData['time'];
      $file = $request->file('Cakefoto'); // Получаем файл из запроса
      $comment = $validatedData['comment'];
    
          try{    
            $Order = new OrderUsers($name,$lastname,$email,$number,$delivery,$street,$kv,$up,$padik,$date,$time,$file,$comment);
            return $Order->Payment();
          }catch(\Exception $e){
        
             return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
         }


         









    
    
    }


    
        

  

 


}
    




