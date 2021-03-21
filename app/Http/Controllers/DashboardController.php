<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listcake;
use App\Slide;

class DashboardController extends Controller
{
    public function loadPage()
    {
        $listcake = Listcake::all();
        $listslide = Slide::all();
        return view('managelistcake', ['listcake' => $listcake, 'listslide' => $listslide]);
    }
}
