<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addAcategory(Request $request)
    {
        $name = $request->namecake;
        $descripe = $request->mota;
        $category = new Category();
        $category->name_cake = $name;
        $category->descripe = $descripe;
        $category->save();
        return back();
    }
    public function removeAcategory($idCategory)
    {
        //
        return back();
    }
}
