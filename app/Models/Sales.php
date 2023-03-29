<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_name',
      'ci',
      'date',
      'name',
      'price',
      'quantity',
      'phone',
      'subTotal',
      'iva',
      'total'

    ];

    protected $casts = [
        'name' => 'object',
      'price' => 'object',
      'quantity' => 'object'
     ];

    // public function products (){
    //     return $this->hasMany(Product::class);
    // }

}
