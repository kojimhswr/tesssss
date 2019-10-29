<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'order_id', 'package_id', 'quantity', 'price'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}