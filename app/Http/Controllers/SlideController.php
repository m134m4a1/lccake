<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function getListSlide()
    {
        $list = Slide::all();
        return $list;
    }
    public function addASlide(Request $request)
    {
        $fileslide = $request->fileSlide;
        $titleslide = $request->titleSlide;
        $path = $fileslide->store('imgslide');
        //echo "Url is :" . $path . "<br>";
        $slide = new Slide();
        $slide->title = $titleslide;
        $slide->urlimg = $path;
        $slide->save();
        return back();
    }
    public function removeASlide(Request $request)
    {
        $aSlide = Slide::find($request->id);
        $aSlide->delete();
        return back();
    }
}
