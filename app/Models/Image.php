<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasUlids;

    protected $fillable = [
        'path',
        'product_id'
    ];
}
