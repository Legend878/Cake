<?php 
namespace App\BussinesLogic;
use App\Models\Product;

class CreateProduct{
    protected $name_cake;
    protected $image;
    protected $price;
    protected $category;
    protected $description;
    protected $tags_one;
    protected $tags_two;




    public function __construct($name_cake, $image,$price, $description,$category,$tags_one, $tags_two)
    {
        $this->name_cake = $name_cake;
        $this->image = $image;
        $this->price = $price;
        $this->description = $description;
        $this->category = $category;
        $this->tags_one = $tags_one;
        $this->tags_two = $tags_two;


        $this->Valid();
    }

    private function Valid(){
        // Check if the field is empty
        if(empty($this->name_cake)){
            throw new \Exception('Название торта обязательно');
        }
        // // Проверка на заглавную
        // if(!ctype_upper($this->name_cake[0])){
        //     throw new \Exception('С большой буквы');

        // }

         // Image check
    if (empty($this->image)) {
        throw new \Exception('Фото обязательно.');
    }

    // check type file
    $allowedMimeTypes = ['image/jpeg', 'image/png'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $this->image);
    finfo_close($finfo);

    if (!in_array($mimeType, $allowedMimeTypes)) {
        throw new \Exception('Допустимые форматы: JPEG, PNG, GIF.');
    }

    // check size file
    $maxSize = 5 * 1024 * 1024; // 5 MB
    if (filesize($this->image) > $maxSize) {
        throw new \Exception('Размер файла не должен превышать 5 МБ.');
    }


    // sace file
    $this->image = $this->storeImage();


        // check price
        if (!is_numeric($this->price) || $this->price < 0) {
            throw new \Exception('Цена должна быть числом и не меньше нуля.');
        }

        // check description
        if (empty($this->description)) {
            throw new \Exception('Описание обязательно.');
        }

        // chech category
        if (empty($this->category)) {
            throw new \Exception('Категория обязательна.');
        }
    }


    private function storeImage()
{

    
    // save file path 'public/cakeimg'
    $path = $this->image->store('cakeimg', 'public'); // save file in 'storage/app/public/cakeimg'


    return $path; //
}



public function save()
    {
        // Создаем новый продукт и сохраняем его в базе данных
        $product = new Product();
        $product->name_cake = $this->name_cake;
        $product->image = $this->image;
        $product->price = $this->price;
        $product->description = $this->description;
        $product->category_id = $this->category; // Убедитесь, что это правильный ключ
        $product->tags_one_id = $this->tags_one;
        $product->tags_two_id = $this->tags_two;

        // Сохраняем продукт в базе данных
        $product->save();
    }


    public function getData()
    {
        return [
            'name' => $this->name_cake,
            'image' => $this->image,
            'price'=> $this->price,
            'category' => $this->category,
            'text' => $this->description,
        ];
    }

}


?>