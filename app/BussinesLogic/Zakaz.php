<?php 
namespace App\BussinesLogic;

use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Session;


class Zakaz{

    private $total = 0;
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;

        $this->CorrectId();
    }

    private function CorrectId(){
        if(!is_numeric($this->id)){
           throw new Exception('передано не число');
     }
     
     // Явлется ли запрос числовым
    }

    public function SearchProduct(){
       return Product::findOrFail($this->id);
        

        //Поиск заказа по id
        
    }

    private function CheckPriceTotal(){

        // Получаем данные из сессии
        $cart = Session::get('cart', []);
        $this->total = 0;

        // Проходим по каждому товару в корзине и суммируем стоимость
        foreach ($cart as $item) {
            $this->total  += $item['price'] * $item['quantity']; // Суммируем цену * количество
        }

        return $this->total ; // Возвращаем итоговую стоимость
        

    }

    public function addtoZakaz(){

       $product =  Product::find($this->id);

      // $this->CheckPriceTotal($product);
        
        // Получаем данные из сессии
        $cart = Session::get('cart', []); // 

        if(isset($cart[$this->id])){
            $cart[$this->id]['quantity']++;
        }else{
            $cart[$this->id] = [
                'id' => $product->id,
                'name_cake'=>$product->name_cake,
                'price'=>$product->price,
                'quantity'=>1,
                'image'=>$product->image,
                'total' => $product->price,
            ];

        }
        Session::put('cart',$cart);
        $this->total = $this->CheckPriceTotal();
        
    }
    
    public function getTotal()
    {
        $cart = Session::get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            // Убедитесь, что 'price' и 'quantity' являются числовыми значениями
            $total += (float)$item['price'] * (int)$item['quantity'];
        }

        return $total; // Возвращаем итоговую стоимость
        
    }
}


?>