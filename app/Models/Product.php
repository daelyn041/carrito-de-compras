<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'details',
        'price',
        'stock',
        'description',
        'image_path',
    ];

    // public function sales (){
    //     return $this->belongsTo(Sales::class);
    // }

    public function productSales (){
        return $this->belongsTo(ProductSale::class);
    }
}
