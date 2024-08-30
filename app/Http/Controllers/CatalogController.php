<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\Nachinka;

class CatalogController extends Controller
{
    public function index(){
      $nachinka = Nachinka::get();

      $product = Product::get();

      return view('catalog',compact('product','nachinka'));
      
      }
   


    
}


