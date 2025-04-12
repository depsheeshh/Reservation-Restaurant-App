<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $table = 'menus';

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'description',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}