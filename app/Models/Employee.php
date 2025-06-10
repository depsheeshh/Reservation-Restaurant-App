<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $table = 'employees';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'image',
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
    
}
