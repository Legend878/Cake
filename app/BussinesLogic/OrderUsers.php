<?php 
namespace App\BussinesLogic;

use App\Models\Product;
use Intervention\Image\Facades\Image;
class OrderUsers{
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
    private $comment ;
    
    public function __construct($name,$lastname, $email, $number, $delivery,$street,$kv,$up,$padik ,$date, $time,$comment )
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
        $this->comment = $comment;

     $this->CorrectUser($name,$lastname, $email, $number, $delivery,$street,$kv,$up,$padik ,$date, $time,$comment );
     


    }

     private function CorrectUser($name,$lastname, $email, $number, $delivery,$street,$kv,$up,$padik ,$date, $time,$comment ){

       
        if($this->ValidName($name)){
            $Newname = mb_ucfirst(mb_strtolower($name)); //Имя Андрей

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
        // Проверка на корректность email
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }








    private function isValidNumber($number){

     // Удаляем все символы, кроме цифр
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


} 