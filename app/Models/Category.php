<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // FIXME: parent not showed on the list
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // FIXME: children not showed on the list
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
