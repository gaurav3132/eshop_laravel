<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts= Product::where('status','Active')
            ->where('featured','yes')->limit(4)->get();

        $latestProducts= Product::where('status','Active')->latest()->limit(4)->get();

        $sliders= Slider::where('status','Active')->get();

        return view('front.home.index',compact('featuredProducts','latestProducts','sliders'));
    }
}
