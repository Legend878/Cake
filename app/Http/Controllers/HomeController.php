<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
        $bento = Product::where('category_id', 1)->get(); //бенто торт
        $myssovyi = Product::where('category_id', 2)->get(); //муссовый торт
        $classic = Product::where('category_id', 3)->get(); //классический торт
        $capcake = Product::where('category_id', 4)->get(); //капкйки

        
        
        return view('index',compact('bento','myssovyi','classic','capcake'));
    }
    
}
