<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'storeName',
        'address',
        'description',
        'img'
    ];

    
    public function owner()
    {
        return $this->hasOne(User::class);
    }
}
