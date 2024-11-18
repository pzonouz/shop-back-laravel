<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class OrderRecord extends Model
{
    use HasUlids;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
    ];
    protected $with = ['product'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
