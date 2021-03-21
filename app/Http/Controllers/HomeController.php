<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listcake;
use App\Slide;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function returnViewHome()
    {
        $listCake = Listcake::all();
        $listSlide =Slide::all();
        //dd($listCake[0]->namecake);
        return view('home', ['listcake' => $listCake,'listslide'=>$listSlide]);
    }
}
