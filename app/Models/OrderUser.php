<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Delivery;
use App\Models\Time;
use App\Models\Fabric;
use App\Models\Adress;
class OrderUser extends Model
{
    use HasFactory;

    protected $table='order_users';
    protected $fillable = [
        'user_id',
        'cake_id',
        'address_id',
        'nachinka_id',
        'quantity',
        'time_id',
        'delivery',
        'comment',
        'file_user',
        'date',
    ];

    

    

     public function orderFabrics()
     {
         return $this->hasMany(Fabric::class,'order_id');
         
     }
 
 
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function product()
{
    return $this->belongsTo(Product::class, 'cake_id');
}

public function delivery()
{
    return $this->belongsTo(Delivery::class, 'delivery');
}

public function time()
{
    return $this->belongsTo(Time::class, 'time_id');
    
}
public function address()
{
    return $this->belongsTo(Adress::class, 'address_id');
}
   
}
