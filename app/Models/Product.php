<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;


    // public function getProduct_sizeAttribute(){
    //     return $this->attribute['product_size'];
    // }

    // public function cart_details()
    // {
    //     return $this->hasMany('Cart');
    // }

}
