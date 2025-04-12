<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    public $table = 'tables';
    protected $fillable = [
        'table_number',
        'capacity',
        'status',
    ];

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
