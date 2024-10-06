<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;
use App\Models\Product;
use App\Models\Nachinka;


class TagsController extends Controller
{
    public function Tags(Request $request){

        
         // Получаем ID выбранного тега
         $tagId = $request->tag;
          // Получаем ID выбранного тега

        // Проверка на валидность ID тега
        if (!is_numeric($tagId)) {
            return response()->json(['error' => 'Invalid tag ID'], 400);
        }

         // Перенаправляем пользователя на страницу с товарами по тегу
         return redirect()->route('TagsShow', ['id' => $tagId]);
     

    }


    public function TagsShow($id){

        // Получаем товары с указанным тегом в двух колонках
        $product = Product::where('tags_one_id', $id)
            ->orWhere('tags_two_id', $id) // Ищем по обеим колонкам
            ->paginate(10);
            $nachinka = Nachinka::get();

        // Возвращаем представление с товарами
        // Возвращаем представление с товарами
        return view('Tags', compact('product','nachinka'));
    }
}
