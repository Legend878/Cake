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


        
    // Найдите товар по ID
    $product = Product::findOrFail($id);
    
    // Получите путь к изображению
    $imagePath = $product->image;

    // Удалите товар из базы данных
    $product->delete();

    // Удалите изображение из хранилища
    if ($imagePath) {
        Storage::delete($imagePath);
    }

    // Перенаправьте обратно с сообщением об успехе
    return redirect()->back()->with('success', 'Товар успешно удален!');

    }
}
