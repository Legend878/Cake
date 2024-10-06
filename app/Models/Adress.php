<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = ['street','floor','lobby','room'];


    public function orderUsers()
    {
        return $this->hasMany(OrderUser::class); // Один Address может принадлежать многим OrderUser
    }    
}
