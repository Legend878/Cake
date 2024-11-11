<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;
use App\Models\Product;
use App\Models\Nachinka;


class TagsController extends Controller
{
    public function Tags(Request $request){

        
         // Get the ID of the selected tag
         $tagId = $request->tag;

        // Checking the validity of the ID tag
        if (!is_numeric($tagId)) {
            return response()->json(['error' => 'Invalid tag ID'], 400);
        }

         // Redirect the user to the page with products by tag
         return redirect()->route('TagsShow', ['id' => $tagId]);
     

    }


    public function TagsShow($id){

        // We receive products with the specified tag in two columns
        $product = Product::where('tags_one_id', $id)
            ->orWhere('tags_two_id', $id) // We search in both columns
            ->paginate(10);
            $nachinka = Nachinka::get();

     
        return view('Tags', compact('product','nachinka'));
    }
}
