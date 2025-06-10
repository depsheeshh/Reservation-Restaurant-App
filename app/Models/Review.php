<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public $table = 'reviews';

    protected $fillable = [
        'name',
        'menu_id',
        'rating',
        'comment',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

}
