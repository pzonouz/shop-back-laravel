<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasUlids;
    protected $fillable = ['user_id', 'status'];

    public function records()
    {
        return $this->hasMany(OrderRecord::class);
    }
}
