<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{

    public function show(){

        $product = Product::get();



        return view('AdminProduct',compact('product'));
    }
    public function DeleteProduct(Request $request, $id){


        
    // Find product  ID
    $product = Product::findOrFail($id);
    
    // get path to image
    $imagePath = $product->image;

    // Delete product in database
    $product->delete();

    // Remove image from storage
    if ($imagePath) {
        Storage::delete($imagePath);
    }

    // back
    return redirect()->back();

    }
}
