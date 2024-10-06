<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Monolog\Logger;
use App\Models\OrderUser;
use Illuminate\Http\Request;
use App\Models\Product;
use App\BussinesLogic\Zakaz;
use App\Models\DateOrder;
use App\Models\Delivery;
use App\Models\Time;
use Carbon\Carbon;

class OrderController extends Controller
{

    

    public function show(){

        $today = Carbon::today();
        $dates = DateOrder::where('order_date', '>=', $today)->get();

        $delivery = Delivery::get();
        $time = Time::get();

             // Получаем данные из сессии
             $cart = session('cart', []);
             // Создаем экземпляр Zakaz
             $zakaz = new Zakaz(0,0,'0','0'); // ID не важен для подсчета
             $totalPrice = $zakaz->getTotal(); // Получаем итоговую стоимость
            
             return view('basket', compact('cart', 'totalPrice','delivery','time','dates')); // Передаем переменные в представление
      //  return view('basket');
    }

    public function DeleteBasket(Request $request){

        $unique_key = $request->unique_key;
            // Получаем корзину из сессии
       $cart = session('cart', []);

    // Проверяем, существует ли товар с данным ID
    if (isset($cart[$unique_key])) {
        // Удаляем товар из корзины
        unset($cart[$unique_key]);
        
        // Обновляем сессию
        session(['cart' => $cart]);

        return redirect()->route('basket');
    }

    
    }


    // public function addBasket(Request $request, $id){

    //     $zakaz = new Zakaz($id,1);

    //         $value =  $zakaz->SearchProduct();

    //         $qwe = $zakaz->addtoZakaz();

    //         $totalPrice = $zakaz->getTotal();
           
       
    //      return redirect()->route('basket',$totalPrice);
    // }   
    public function addDelivery(Request $request)
    {
        
        
            // Получаем текущую корзину из сессии
            $cart = session('cart', []);

            // Добавляем товар "Доставка" в корзину
            $deliveryItem = [
                'id' => 9999,
                'name_cake' => 'Доставка',
                'price' => 350,
                'quantity' => 1,
                'image' => null // Укажите путь к изображению
            ];
    
    
            // Добавляем доставку в корзину
            $cart['9999'] = $deliveryItem;
            session(['cart' => $cart]);
    
            // Получаем общую стоимость
            $quantity = 1;
            $zakaz = new Zakaz(0,$quantity,'0','0');
            $totalPrice = $zakaz->getTotal();

             // Получаем общую стоимость
        $totalPrice = $this->calculateTotalPrice($cart); // Метод для расчета общей стоимости
        //   return redirect()->route('basket',$totalPrice);



                    return response()->json(['cart' => $cart, 'totalPrice' => $totalPrice]);


        
    }

    public function getCart()
{
    // Получаем корзину из сессии
    $cart = session('cart', []);
    
    // Получаем общую стоимость
    $totalPrice = $this->getTotal(); // Предполагается, что этот метод рассчитывает общую стоимость

    return response()->json(['cart' => $cart, 'totalPrice' => $totalPrice]);
}

private function getTotal()
{
    $cart = session('cart', []);
    $total = 0;

    foreach ($cart as $item) {
        if (isset($item['price']) && isset($item['quantity'])) {
            $total += $item['price'] * $item['quantity'];
        }
    }

    return $total;
}

    
private function calculateTotalPrice($cart)
{
    $total = 0;

    foreach ($cart as $item) {
        if (isset($item['price']) && isset($item['quantity'])) {
            $total += $item['price'] * $item['quantity'];
        }
    }

    return $total;
}
    
    public function removeDelivery(Request $request)
    {
        
            // Удаляем товар "Доставка" из корзины
            $cart = session('cart', []);
            
            if (isset($cart['9999'])) {
                unset($cart['9999']);
                session(['cart' => $cart]);
            }

            $quantity = 1;
    
            $zakaz = new Zakaz(0,$quantity,'0','0');
            $totalPrice = $zakaz->getTotal();
    
            return response()->json(['cart' => $cart, 'totalPrice' => $totalPrice]);
       
    }

    


    public function addBasketBento(Request $request){

         // Валидация входящих данных
    $validatedData = $request->validate([
        'product_id' => 'required|integer', // Убедитесь, что product_id передан и является целым числом
        'nachinka' => 'required|string', // Если нужно, добавьте валидацию для начинки
        'quantity' => 'required|integer|min:1|max:10', // Валидация количества
    ]);

    // Извлечение данных из валидированного массива
    $productId = $validatedData['product_id'];
    $nachinka = $validatedData['nachinka'];
    $quantity = $validatedData['quantity'];
    $size = 's';

        


        $zakaz = new Zakaz($productId,$quantity,$nachinka,$size);

            $value =  $zakaz->SearchProduct();

            $qwe = $zakaz->addtoZakaz();

            $totalPrice = $zakaz->getTotal();
           
            return redirect()->route('basket')->with('totalPrice', $totalPrice);

    }
    public function addBasketCake(Request $request){
     // Валидация входящих данных
     $validatedData = $request->validate([
        'product_id' => 'required|integer|min:1', // Убедитесь, что product_id передан и является целым числом
        'size' => 'required|in:s,m,x', // Проверка на наличие размера и его соответствие допустимым значениям
        'nachinka' => 'required|string', // Если нужно, добавьте валидацию для начинки
        'quantity' => 'required|integer|min:1|max:10', // Валидация количества
    ]);

    // Извлечение данных из валидированного массива
    $productId = (int)$validatedData['product_id'];
    $nachinka = $validatedData['nachinka'];
    $quantity = $validatedData['quantity'];
    $size = $validatedData['size']; // Получаем размер из валидированных данных



        $zakaz = new Zakaz($productId,$quantity,$nachinka,$size);

            $value =  $zakaz->SearchProduct();

            $qwe = $zakaz->addtoZakaz();

            $totalPrice = $zakaz->getTotal();
           
            return redirect()->route('basket')->with('totalPrice', $totalPrice);

    }
    public function addBasketCapcakes(Request $request){

         // Валидация входящих данных
    $validatedData = $request->validate([
        'product_id' => 'required|integer', // Убедитесь, что product_id передан и является целым числом
        'nachinka' => 'required|string', // Если нужно, добавьте валидацию для начинки
        'quantity' => 'required|integer|min:4|max:16', // Валидация количества
    ]);

    // Извлечение данных из валидированного массива
    $productId = $validatedData['product_id'];
    $nachinka = $validatedData['nachinka'];
    $quantity = $validatedData['quantity'];
    $size = 's';
        

        $zakaz = new Zakaz($productId,$quantity,$nachinka,$size);

            $value =  $zakaz->SearchProduct();

            $qwe = $zakaz->addtoZakaz();

            $totalPrice = $zakaz->getTotal();
           
            return redirect()->route('basket')->with('totalPrice', $totalPrice);

    }

    public function checkAvailability(Request $request)
{
    $selectedDate = $request->date; // Измените на 'date', если вы используете это имя в AJAX

    // Проверка наличия мест для выбранной даты
    $cakeOrderfind = DateOrder::where('order_date', $selectedDate)->first();

    // Проверяем доступные места
    if ($cakeOrderfind) {
        if ($cakeOrderfind->avaliable_slots > 0) {
            return response()->json(['available' => true]); // Места доступны
        } else {
            return response()->json(['available' => false]); // Мест нет
        }
    } else {
        // Если запись не найдена, можно вернуть, что мест нет
        return response()->json(['available' => true]);
    }

    
}

    // public function ShowPrice($total){

    //     foreach (session('cart') as $item) {
    //         $total += $item['quantity'] * $item['price'];
            
    //     }
    
    //   return $total;
    // }

//     public function addBasket(Request $request,$id)
//     {
//         $product = Product::findOrFail($id); // поиск по id
       
//         $cart = session()->get('cart', []); // создание сессии

//         if(isset($cart[$id])){
//             $cart[$id]['quantity']++;  // если id имеется то увеличить кол-во
//         }else{

//             $cart[$id] = [
//                 "image"=>$product->image,
//                 "name" => $product->name_cake,
//                 "quantity" => 1, // если товара такого нет, сделать новый я
//                 "price" => $product->price
//             ];

//         }

//         session()->put('cart', $cart);
       

//         $value = $this->ShowPrice(1);
//   return redirect()->route('basket')->with('value',$value); //->with('success', 'Товар добавлен в корзину!');
//     }

     
}