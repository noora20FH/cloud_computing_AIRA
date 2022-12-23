<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidence_shipping extends Model
{
    use HasFactory;
    protected $table = 'evidence_shipping';
    protected $fillable = [
        'order_id',
        'image_evidence',
    ];
}
