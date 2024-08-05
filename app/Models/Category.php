<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Category extends Model
{
    use HasFactory;
    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }
}


// $table->string('quantity');
// $table->string('price')->nullable();
// $table->string('price_after_discount')->nullable();
// $table->unsignedBigInteger('user_id')->nullable();
// $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
// $table->unsignedBigInteger('product_id')->nullable();
// $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

// public function products(){
//     return $this->belongsTo(Product::class,'product_id');
// }