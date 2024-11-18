<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasUlids;
    protected $fillable = [
        'title',
        'description',
        'quantity',
        'price',
        'category_id'
    ];

    protected $with = ['images'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
