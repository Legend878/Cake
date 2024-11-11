<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\Nachinka;

class CatalogController extends Controller
{


  // get product with categories 

  
    public function index(){
      $nachinka = Nachinka::get();

      $product = Product::query()->paginate(10);

      return view('catalog',compact('product','nachinka'));
      
      }



      public function ShowBento(){
        $nachinka = Nachinka::get();

        $bento = Product::where('category_id', 1)->paginate(10);

  
        return view('bentos',compact('bento','nachinka'));
      }

      public function ShowCapcakes(){
        $nachinka = Nachinka::get();

        $capcake = Product::where('category_id', 4)->paginate(10); 
  
        return view('capcakes',compact('capcake','nachinka'));
      }

      public function ShowClassic(){
        $nachinka = Nachinka::get();

        $classic = Product::where('category_id', 3)->paginate(10); 

        return view('classic',compact('classic','nachinka'));
      }


      public function Showpack(){
        $nachinka = Nachinka::get();

        $packs = Product::where('category_id', 5)->paginate(10);
  
        return view('pack',compact('packs','nachinka'));
      }
   
   


    
}


