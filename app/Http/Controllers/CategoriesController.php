<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function products($id)
    {
        $category = Categories::find($id);
        return response()->json([
            'success' => true,
            'products' => $category['products'],
        ]);
    }
}
