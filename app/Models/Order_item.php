<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    public $table = 'order_items';
    protected $fillable = [
        'order_id',
        'menu_id',
        'quantity',
        'price',
        'discount',
        'final_price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id',);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id',);
    }
}

