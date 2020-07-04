<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Product extends Model implements Authenticatable
{
    use AuthenticableTrait;

    public function categorys()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
