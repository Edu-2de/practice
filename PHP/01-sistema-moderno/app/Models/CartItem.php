<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Opcional, mas bom ter
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantity'];

    // O NOME DESSA FUNÇÃO É CRUCIAL 👇
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
