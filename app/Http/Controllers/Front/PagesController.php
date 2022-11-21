<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function category(Category $category)
    {

        $products=$category->products()->where('status','Active')->latest()->paginate(12);

        return view('front.pages.category',compact('category','products'));
    }


    public function brand(Brand $brand)
    {

        $products=$brand->products()->where('status','Active')->latest()->paginate(12);

        return view('front.pages.brand',compact('brand','products'));
    }


    public function product(Product $product)
    {

        $similarProducts= Product::where('status','Active')
            ->where('id','!=',$product->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('front.pages.product',compact('product','similarProducts'));


    }


    public function search(Request $request)
    {
        $term= $request->term;

        $products= Product::where('name','like','%'.$term.'%')
            ->where('status','Active')
            ->latest()
            ->paginate(12);

        return view('front.pages.search',compact('products','term'));
    }
}
