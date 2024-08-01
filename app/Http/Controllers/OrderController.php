<?php

namespace App\Http\Controllers;
use App\Models\OrderUser;
use Illuminate\Http\Request;
use App\Models\Product;
use App\BussinesLogic\Zakaz;

class OrderController extends Controller
{

    

    public function show(){

             // Получаем данные из сессии
             $cart = session('cart', []);
        
             // Создаем экземпляр Zakaz
             $zakaz = new Zakaz(0); // ID не важен для подсчета
             $totalPrice = $zakaz->getTotal(); // Получаем итоговую стоимость
            
             return view('basket', compact('cart', 'totalPrice')); // Передаем переменные в представление
      //  return view('basket');
    }


    public function addBasket(Request $request, $id){
        $zakaz = new Zakaz($id);

            $value =  $zakaz->SearchProduct();

            $qwe = $zakaz->addtoZakaz();

            $totalPrice = $zakaz->getTotal();
           
            return redirect()->route('basket')->with('totalPrice', $totalPrice);
           
            
          //return redirect()->route('basket',compact('totalPrice'));
          //  return view('basket',compact('totalPrice'));
          
       //   return view('basket', compact('totalPrice'));
        
        //  return redirect()->route('basket',$totalPrice);
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