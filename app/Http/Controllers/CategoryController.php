<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function getCategorys()
    {
        return Category::all();
    }
}
