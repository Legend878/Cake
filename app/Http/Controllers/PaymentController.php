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

         // Getting data from the session
         $cart = session('cart', []);
        // Create an instance of Zakaz
         $zakaz = new Zakaz(0,0,'0','0'); //ID is not important for counting
         $totalPrice = $zakaz->getTotal(); // We get the final cost
         try {
         $validatedData = $request->validate([
            'name' => 'required|string|max:30|regex:/^[а-яА-ЯёЁ\s]+$/u', // Добавлено регулярное выражение
            'lastname' => 'required|string|max:30|regex:/^[а-яА-ЯёЁ\s]+$/u', // 
            'Email' => 'required|email|max:150',
            'number_phone' => 'required|string|max:12',
            'delivery' => 'required|string|max:160',
            'street' => 'nullable|string|max:255',
            'kv' => 'nullable|string|max:10',
            'up' => 'nullable|string|max:10',
            'padik' => 'nullable|string|max:10',
            'date' => 'required|date',
            'time' => 'required|string',
            'Cakefoto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'comment' => 'nullable|string|max:500',
        ], [
            // Custom Error Messages
            'name.required' => 'Имя обязательно для заполнения.',
            'name.regex' => 'Имя обязательно русскими буквами.',

            'name.string' => 'Имя должно быть строкой.',
            'name.max' => 'Имя не может превышать 30 символов.',
            
            'lastname.required' => 'Фамилия обязательна для заполнения.',
            'lastname.regex' => 'Фамилия обязательно русскими буквами.',
            'lastname.string' => 'Фамилия должна быть строкой.',
            'lastname.max' => 'Фамилия не может превышать 30 символов.',
            
            'Email.required' => 'Электронная почта обязательна для заполнения.',
            'Email.email' => 'Введите корректный адрес электронной почты.',
            'Email.max' => 'Электронная почта не может превышать 150 символов.',
            
            'number_phone.required' => 'Номер телефона обязателен для заполнения.',
            'number_phone.max' => 'Номер телефона не может превышать 12 символов.',
            
            'delivery.required' => 'Поле доставки обязательно для заполнения.',
            'date.required' => 'Поле даты обязательно для заполнения.',
        ]);
    }catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->withErrors($e->validator)->withInput();
    }
  
     
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
      $file = $request->file('Cakefoto'); 
      $comment = $validatedData['comment'];
    
          try{    
            $Order = new OrderUsers($name,$lastname,$email,$number,$delivery,$street,$kv,$up,$padik,$date,$time,$file,$comment);
            return $Order->Payment();
          }catch(\Exception $e){
        
            return redirect()->back()->withErrors(['error' => 'Произошла ошибка. Пожалуйста, попробуйте еще раз.']);     
        }


         









    
    
    }


    
        

  

 


}
    




