<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasUlids;
    protected $fillable = ['title'];
    protected $with = ['product'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
