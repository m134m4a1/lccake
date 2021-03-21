<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listcake;
use Illuminate\Support\Facades\DB;
use App\Category;

class ListCakeController extends Controller
{
    public function getIdCategoryById($namecategory)
    {
        $id = DB::table('categories')->select(['id'])->where('name_cake', $namecategory)->get();
        return $id[0]->id;
    }
    public function addACake(Request $request)
    {
        $file = $request->fileimgcake;
        // if ($request->hasFile('fileimgcake')) {
        //     echo "you have entered a file";
        // //     $file = $request->file('myFile');
        // //     $filename = $file->getClientOriginalName('myFile'); // lay tean file
        // //     $exfile = $file->getClientOriginalExtension();
        // //     echo "You have file :" . $filename . "<br>";
        // //     $file->move('anh', 'tenmoi.jpg');
        // } else {
        //     echo "you have not chooise a file";
        // }
        //dd($file);
        $path = $file->store('imgcake');
        $anCake = new Listcake();
        $anCake->category_id = $this->getIdCategoryById($request->category);
        $anCake->namecake = $request->namecake;
        $anCake->urlimg = $path;
        $anCake->cost = $request->cost;
        //echo $anCake;
        $anCake->save();
        return back();
    }
    public function getListCategoryCake()
    {
        $listCategory = Category::all();
        return view('uploadcake', ['listCategory' => $listCategory]);
    }
    public function getListCategoryCakeForManage()
    {
        $list = Listcake::all();
        // return view('managelistcake', ['listCategory' => $listCategory]);
        session(['listcakemanage' => $list]);
        return view('managelistcake');
    }
    public function getAllListCake()
    {
        $list = ListCake::all();
        return $list;
    }
    public function getAListCakeByIdCategory($id)
    {
        $listCakeByIdCategory = Listcake::where('category_id', $id)->get();
        return $listCakeByIdCategory;
    }
    public function deleteACakeById(Request $request)
    {
        //echo "id need to delete is :" . $request->id;
        $aCake = Listcake::find($request->id);
        $aCake->delete();
        return back();
    }
}
