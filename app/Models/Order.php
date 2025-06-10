<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table = 'orders';

    protected $fillable = [
        'user_id',
        'reservation_id',
        'order_name',
        'total_price',
        'status',
        'discount',
        'final_price',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_item()
    {
        return $this->hasMany(Order_item::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    

}
