<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Time;

class CatalogController extends Controller
{
    public function index(){

      $product = Product::get();

      return view('catalog',compact('product'));
      
      }
   


    
}


