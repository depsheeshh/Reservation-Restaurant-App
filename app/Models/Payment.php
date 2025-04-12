<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $table = 'payments';

    protected $fillable = [
        'order_id',
        'amount',
        'status',
    ];

    public function order_item()
    {
        return $this->belongsTo(Order_item::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
