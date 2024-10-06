<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateOrder extends Model
{
    use HasFactory;
    protected $table = 'date_order';

    protected $fillable = ['order_date','avaliable_slots'];
}
