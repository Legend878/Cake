<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Nachinka;
use App\Models\Tags;

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
        //get all product with categories in general 
        $nachinka = Nachinka::get();
        $product = Product::get();
        $bento = Product::where('category_id', 1)->limit(5)->get(); //бенто торт
        $myssovyi = Product::where('category_id', 2)->limit(5)->get(); //муссовый торт
        $classic = Product::where('category_id', 3)->limit(5)->get(); //классический торт
        $capcake = Product::where('category_id', 4)->limit(5)->get(); //капкйки
        $packs = Product::where('category_id', 5)->limit(5)->get(); //nabor

        $tags = Tags::get();

        
        
        return view('index',compact('bento','product','myssovyi','classic','capcake','nachinka','packs','tags'));
    }
    
}
