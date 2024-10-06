<?php 
namespace App\BussinesLogic;

use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Session;


class Zakaz{

    private $total = 0;
    protected $id;
    private $nachinka;
    private $quantity;
    private $size;
    private $price;

    public function __construct($id,$quantity,$nachinka,$size)
    {
        $this->id = $id;
        $this->quantity = $quantity;
        $this->nachinka = $nachinka;
        $this->size = $size;
        $this->CorrectId();
    }

    private function CorrectId(){
        if(!is_numeric($this->id)){
           throw new Exception('передано не число');
     }


      // Получаем товар из базы данных
    //   $this->setPrice(21);
      // Устанавливаем базовую цену из базы данных
$product =  Product::find($this->id);

     switch($this->size){
        case 's':
            $this->setSize('Standart');
            $this->setPrice($product->price);
            break;
        case 'm':
            $this->setSize('Middle');
            $this->setPrice(2000.00);
            break;
        case 'x':
            $this->setSize('Max');
            $this->setPrice(2800.00);

            break;
        default:
        break;

     
     // Явлется ли запрос числовым
    }
}

private function setPrice($price){
    return $this->price = $price;

}
public function GetPrice(){
    return $this->price;
}

    private function setSize($size){
        return $this->size = $size;

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
        
        $uniqueKey = $this->id . '-' . $this->size . '-' . $this->nachinka; // Например: '3-Standart-Сливки'

        if(isset($cart[$uniqueKey])){
            $cart[$uniqueKey]['quantity']++;
        }else{
            $cart[$uniqueKey] = [
                'id' => $product->id,
                'name_cake'=>$product->name_cake,
                'size' => $this->size,
                'nachinka'=>$this->nachinka,
                'price'=>$this->GetPrice(),
                'quantity'=>$this->quantity,
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