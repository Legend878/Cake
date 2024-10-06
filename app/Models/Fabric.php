<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    use HasFactory;

    protected $table = 'order_fabric';

    protected $fillable = [
        'order_id',
        'orderID_bank',
        'status_order',
        'number_tranzak',
     
    ];

    public function orderUser()
    {
        return $this->belongsTo(OrderUser::class,'order_id');

    }

    public function user() // Добавляем связь с User через OrderUser
    {
        return $this->hasOneThrough(User::class, OrderUser::class, 'id', 'id', 'order_id', 'user_id');
    }

    public function address()
    {
        return $this->hasOneThrough(Adress::class, OrderUser::class, 'id', 'id', 'order_id', 'address_id');
        // Здесь 'order_id' - это внешний ключ в таблице OrderUser, а 'address_id' - это внешний ключ в таблице Address
    }
}
