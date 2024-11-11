<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifiCode extends Model
{
    use HasFactory;

    protected $table = 'verification_codes';

    protected $fillable = ['admin_id', 'code'];
   public function admin()
   {
       return $this->belongsTo(Admin::class); 
   }
}
