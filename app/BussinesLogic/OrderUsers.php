<?php 
namespace App\BussinesLogic;

use App\Models\DateOrder;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\OrderUser;
use App\Models\Fabric;
use App\Models\Nachinka;
use Kenvel\Tinkoff;
use App\Models\User;
use App\Models\Adress;

class OrderUsers{

    protected $tinkoff;

    private $status;
    private $number_pay;

    private $payment_id;
    private $orderID;
    private $name;
    private $lastname;
    private $email ;
    private $number ;
    private $delivery;
    private $street ;
    private $kv ;
    private $up;
    private $padik ;
    private $date ;
    private $time;
    private $file;
    private $comment;
    
    public function __construct($name,$lastname, $email, $number, $delivery,$street,$kv,$up,$padik ,$date, $time,$file,$comment )
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->number = $number;
        $this->delivery = $delivery;
        $this->street = $street;
        $this->kv = $kv;
        $this->up = $up;
        $this->padik = $padik;
        $this->date = $date;
        $this->time = $time;
        $this->file = $file;
        $this->comment = $comment;

     $this->CorrectUser($name,$lastname, $email, $number, $delivery,$street,$kv,$up,$padik ,$date, $time,$file, $comment );
     


    }

     private function CorrectUser($name,$lastname, $email, $number, $delivery,$street,$kv,$up,$padik ,$date, $time,$file,$comment ){

       
        if($this->ValidName($name)){
            $Newname = mb_ucfirst(mb_strtolower($name)); 

            $this->SetName($Newname);
        }else{
            throw new \Exception("Имя должно содержать только русские буквы, быть от 3 до 15 символов.");

        }

        if($this->ValidName($lastname)){
            $Newlastname =mb_ucfirst(mb_strtolower($lastname)); 
            $this->Setlastname($Newlastname);
        }else{
            throw new \Exception("Фамилия должно содержать только русские буквы, быть от 3 до 15 символов.");

        }

        if($this->isValidEmail($email)){
            $this->email = $email;
        }else{
            throw new \Exception ("Некорректный адрес электронной почты.");
        }

        if($this->isValidNumber($number)){
            $this->number = $number;
        }else{
            throw new \Exception ("Некорректный номер телефона.");
        }

        if($this->isValidDate($date)){
            $this->date = $date;
        }
        else{
            throw new \Exception ("Некорректая дата.");

        }

        if (!empty($this->file)) {
           $file = $this->isValidFile($this->file);

            return $this->file = $file;
        }
    


      
    
    }

    private function isValidFile($file) {
       // check type file
    $allowedMimeTypes = ['image/jpeg', 'image/png'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file);
    finfo_close($finfo);

    if (!in_array($mimeType, $allowedMimeTypes)) {
        throw new \Exception('Допустимые форматы: JPEG, PNG, GIF.');
    }

    // check type file
    $maxSize = 5 * 1024 * 1024; // 5 MB
    if (filesize($file) > $maxSize) {
        throw new \Exception('Размер файла не должен превышать 5 МБ.');
    }


    //save file
   

     // save file in folder 'public/cakeimg'
     $file = $file->store('ImageUsers', 'public'); // save file in path 'storage/app/public/cakeimg'


     return $file;

    }
    
    

    private function SetFile($file){
        return $this->file = $file;
    }
   

    private function isValidDate($date)
    {
        // Преобразуем строку даты в объект Carbon
        $orderDate = Carbon::parse($date);
    
        // find date
        $cakeOrder = DateOrder::where('order_date', $orderDate)->first();
    
        // If there is no record, create it
        if (!$cakeOrder) {
            $cakeOrder = DateOrder::create([
                'order_date' => $orderDate,
                //  'avaliable_slots' => 10 // Устанавливаем 10 мест по умолчанию
            ]);

        }
    
        // We process available places
        return $this->createDate($orderDate);
    }
    
    private function createDate($orderDate){

    $cakeOrderfind = DateOrder::where('order_date', $orderDate)->first();

        // Checking available places
        if ($cakeOrderfind->avaliable_slots > 0) {
            // Reducing the number of available seats
            $cakeOrderfind->avaliable_slots--;
            $cakeOrderfind->save(); // save update
            return true; // Успешно 
        } else {
            throw new \Exception("Нет доступных мест");
        }
    }


    public function SetDate($date){
        return $this->date = $date;
    }

    public function GetDate(){
        return $this->date;
    }

    

    private function ValidName($name){
        if (mb_strlen($name) < 3 || mb_strlen($name) > 15) {
            return false;
        }

        // Проверка на наличие только русских букв и пробелов
        if (!preg_match('/^[а-яА-ЯёЁ\s]+$/u', $name)) {
            return false;
        }

        // Проверка на наличие HTML и JavaScript
        if (preg_match('/<script.*?>.*?<\/script>/is', $name) || strip_tags($name) !== $name) {
            return false;
        }

        return true;

    }

    public function Setlastname($lastname){
        return $this->lastname = $lastname;
    }

    public function Getlastname(){
        return $this->lastname;
    }



     public function SetName($name){
         return $this->name = $name;
     }

    public function getName(){

        return $this->name;
    }







    public function setEmail($email){
        return $this->email = $email;

    }

    public function GetEmail(){
        return $this->email;
    }




    private function isValidEmail($email) {
        // Проверка на корректность email check email
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }








    private function isValidNumber($number){

     // Удаляем все символы, кроме цифр delete numbers and symbols
      $number = preg_replace('/\D/', '', $number);
        
        // Проверяем, что длина номера ровно 11 цифр и состоит только из цифр
          return (mb_strlen($number) === 11 && preg_match('/^\d{11}$/', $number));

    }

    

    public function setNumber($number){
        return $this->number = $number;


    }


    public function GetNumber(){
        return $this->number;
    }


    public function setOrderID($orderID){
        return $this->orderID = $orderID;


    }

    public function GetOrderID(){
        return $this->orderID;
    }


    public function Payment(){

        $api_url    = 'https://securepay.tinkoff.ru/v2/';
            $terminal   = config('tinkoff.merchant_id');
            $secret_key = config('tinkoff.secret_key');
    
            $tinkoff = new Tinkoff($api_url, $terminal, $secret_key);

        $zakaz = new Zakaz(0,0,'0','0');

        $totalPrice = $zakaz->getTotal(); // get total
        $orderID = uniqid();
        $this->setOrderID($orderID);

        $payment = [
                'OrderId'       => $orderID,        //Ваш идентификатор платежа
                'Amount'        => $totalPrice,           //сумма всего платежа в рублях
                'Language'      => 'ru',            //язык - используется для локализации страницы оплаты
                'Description'   => 'Покупка тортов',   //описание платежа
                'Email'         => $this->email,//email покупателя
                'Phone'         => $this->number,   //телефон покупателя
                'Name'          => $this->name, //Имя покупателя
                'Taxation'      => 'osn'     //Налогооблажение
        ];

       

        $items = []; // Инициализируем массив $items

        foreach (session('cart') as $elem) {
            $items[] = [
                'Name' => $elem['name_cake'],
                'Price' => $elem['price'], // Используйте цену конкретного элемента
                'Quantity' => $elem['quantity'],
                'NDS' => "vat0",
            ];
        }

        $cart = session('cart', []);
            
        if (isset($cart['9999'])) {
            unset($cart['9999']);
            session(['cart' => $cart]);
        }


        
         $paymentURL = $tinkoff->paymentURL($payment, $items);

         
        

         if(!$paymentURL){
            echo($tinkoff->error);
          } else {
            $payment_id = $tinkoff->payment_id;
            // return redirect($result['payment_url']);
          }
          
          $status = $tinkoff->getState($payment_id);

          //Контроль ошибок
          if(!$status){
             // echo($tinkoff->error);
           } else {
             $this->payment_id = $tinkoff->payment_id;
             $this->SetNumberPay($payment_id);
             $this->SetStatus($status);
           }
          

      
         if ($paymentURL) {
            $this->SaveUserOrder();
             return redirect($paymentURL); // redirect payment
          } else {
           
              return response()->json(['error' => $this->tinkoff->error], 400); // Обработка ошибки
          }
        }

    public function SetStatus($status){

        return $this->status = $status;

    }

    public function SetNumberPay($payment_id){
        return $this->number_pay = $payment_id;
    }


    private function DoubleUser($number, $email)
    {

        $number = trim($number);
        $email = trim(strtolower($email));
        
        $user = User::where('email', '=', $email)
                    ->first();

        // Если пользователь не найден, создаем нового create new user
        if (!$user) {
            $user = new User;
            $user->First_name = mb_ucfirst(mb_strtolower($this->name));
            $user->last_name = mb_ucfirst(mb_strtolower($this->lastname));
            $user->email = strtolower($email);
            $user->number_phone = preg_replace('/\D/', '', $number); // Удаляем все символы кроме цифр
    
            // Сохраняем нового пользователя в базе данных save user
            $user->save();
        }
    
        return $user; // Возвращаем найденного или нового пользователя
    }
    
private function SaveUserOrder()
{
    // Проверяем существование пользователя
    $user = $this->DoubleUser($this->number, $this->email);

    // Проверяем, нужно ли обновить имя и фамилию check update name and last name
    if ($user->First_name !== mb_ucfirst(mb_strtolower($this->name)) || 
        $user->last_name !== mb_ucfirst(mb_strtolower($this->lastname))) {
        // Обновляем имя и фамилию update
        $user->First_name = mb_ucfirst(mb_strtolower($this->name));
        $user->last_name = mb_ucfirst(mb_strtolower($this->lastname));
        
        // Сохраняем изменения save change
        $user->save();
    }


    $this->SaveAdressUser($user->id);

}
private function SaveAdressUser($userID){
    $adress = new Adress;
    $adress->user_id = $userID;
    $adress->street = $this->street;
    $adress->floor = $this->up;
    $adress->lobby = $this->padik;
    $adress->room = $this->kv;


    $adress->save();


    $this->SaveUserProduct($userID,$adress->id);


}

private function SaveUserProduct($usersID,$adress){
    $this->clearSessionById(999);

    
    foreach(session('cart') as $elem){

    $orderUsers = new OrderUser();
    $orderUsers->user_id = $usersID;
    $orderUsers->address_id = $adress;
    $orderUsers->cake_id = $elem['id'];
    $orderUsers->size = $elem['size'];
    $orderUsers->nachinka_id = $elem['nachinka'];
    $orderUsers->quantity = $elem['quantity'];
    $orderUsers->time_id  = $this->time;
    $orderUsers->delivery =$this->delivery;
    $orderUsers->comment = $this->comment; 
    $orderUsers->file_user = $this->file;
    $orderUsers->date = $this->date;

    

    $orderUsers->save();

    $this->SaveFabricOrder($orderUsers->id);


}


}
private function SaveFabricOrder($orderUser_id){
    
    $fabric = new fabric();
    $fabric->order_id = $orderUser_id;
    $fabric->orderID_bank = $this->GetOrderID();
    $fabric->status_order = $this->status; 
    $fabric->number_tranzak= $this->number_pay;
    

    $fabric->save();


}



public function clearSessionById($id)
{
    // Get the current cart from the session
    $cart = session('cart', []);

    // We go through all the elements of the basket
    foreach ($cart as $key => $item) {
        // We check if the element id matches the passed one
        if (isset($item['id']) && $item['id'] == $id) {
            // Removing an item from the basket
            unset($cart[$key]);
        }
    }

    // Save the updated cart back to the session
    session(['cart' => $cart]);
}


} 