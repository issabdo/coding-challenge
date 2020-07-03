<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categorys()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
