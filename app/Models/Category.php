<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $table = 'categories';
    protected $fillable = [
        'name',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
    
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    
}
