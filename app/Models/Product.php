<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tags;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function getImageAttrubute(){

        return url('storage/'.$this->Image);
    }

    public function tagOne()
    {
        return $this->belongsTo(Tags::class, 'tags_one_id'); // Связь с первым тегом
    }

    public function tagTwo()
    {
        return $this->belongsTo(Tags::class, 'tags_two_id'); // Связь со вторым тегом
    }
}
