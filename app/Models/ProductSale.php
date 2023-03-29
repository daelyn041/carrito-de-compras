<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
      ];

      public function products (){
        return $this->hasMany(Product::class);
    }

}
