<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Nachinka;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //    // $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    public function index()
    {
        $nachinka = Nachinka::get();
        $product = Product::get();
        $bento = Product::where('category_id', 1)->get(); //бенто торт
        $myssovyi = Product::where('category_id', 2)->get(); //муссовый торт
        $classic = Product::where('category_id', 3)->get(); //классический торт
        $capcake = Product::where('category_id', 4)->get(); //капкйки

        
        
        return view('index',compact('bento','product','myssovyi','classic','capcake','nachinka'));
    }
    
}
