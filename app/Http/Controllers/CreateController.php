<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Validator;
use App\BussinesLogic\CreateProduct; 
use App\Models\Tags;

class CreateController extends Controller
{
    public function index(){
        $categories = Category::all();
        $tags = Tags::all();



        return view('Create',compact('categories','tags'));
    }

    public function CreateAdd( Request $request){

        $name = $request->Name_cake;
        $image = $request->file('Image');
        $price = $request->Price;
        $decription = $request->Description;
        $category = $request->category_id;
        $tags_one = $request->tags_one_id;
        $tags_two = $request->tags_two_id;



        try{

          //  $product = new Product();
            $create = new CreateProduct($name, $image,$price,$decription, $category, $tags_one, $tags_two);

           // $data = $create->getData(); 

            $create->save();
            
            return back();
        }catch(\Exception $e){
        
            return back()->withErrors(['error'=>$e->getMessage()]);
        }

       
  
    }  

}