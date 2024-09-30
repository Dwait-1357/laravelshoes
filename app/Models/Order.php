<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'total_price', 'shipping_fee', 'status','transaction_id'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
