<?php 
namespace App\BussinesLogic;

use App\Models\Product;
use Intervention\Image\Facades\Image;
class CreateProduct{
    protected $name_cake;
    protected $image;
    protected $price;
    protected $category;
    protected $description;




    public function __construct($name_cake, $image,$price, $description,$category)
    {
        $this->name_cake = $name_cake;
        $this->image = $image;
        $this->price = $price;
        $this->description = $description;
        $this->category = $category;

        $this->Valid();
    }

    private function Valid(){
        // Проверка на пустоту поля 
        if(empty($this->name_cake)){
            throw new \Exception('Название торта обязательно');
        }
        // // Проверка на заглавную
        // if(!ctype_upper($this->name_cake[0])){
        //     throw new \Exception('С большой буквы');

        // }

         // Проверка на изображение
    if (empty($this->image)) {
        throw new \Exception('Фото обязательно.');
    }

    // Проверка типа файла
    $allowedMimeTypes = ['image/jpeg', 'image/png'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $this->image);
    finfo_close($finfo);

    if (!in_array($mimeType, $allowedMimeTypes)) {
        throw new \Exception('Допустимые форматы: JPEG, PNG, GIF.');
    }

    // Проверка размера файла
    $maxSize = 5 * 1024 * 1024; // 5 MB
    if (filesize($this->image) > $maxSize) {
        throw new \Exception('Размер файла не должен превышать 5 МБ.');
    }

    // Сохранение файла
    $this->image = $this->storeImage();



        // Проверка на цену
        if (!is_numeric($this->price) || $this->price < 0) {
            throw new \Exception('Цена должна быть числом и не меньше нуля.');
        }

        // Проверка на описание
        if (empty($this->description)) {
            throw new \Exception('Описание обязательно.');
        }

        // Проверка на категорию
        if (empty($this->category)) {
            throw new \Exception('Категория обязательна.');
        }
    }

    private function storeImage()
{

    // Сохранение файла в папку 'public/cakeimg'
            $path = $this->image->store('cakeimg', 'public'); // Сохраняем файл в 'storage/app/public/cakeimg'

        return $path; // Возвращаем путь к файлу
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