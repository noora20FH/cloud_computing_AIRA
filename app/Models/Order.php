<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'store_id',
        'name',
        'phone',
        'email',
        'address',
        'postal_code',
        'province',
        'country',
        'status',
        'message',
        'tracking_no',
        'grand_total',
        'image_evidence',
    ];

    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }
}
