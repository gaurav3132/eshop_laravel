<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::latest()->paginate(10);

        return view('cms.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.products.create');
    }


    public function store(Request $request)
    {
        $validated= $request->validate([
            'name' => 'required|string',
            'summery' => 'required|string',
            'details' => 'required|string',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',
            'images.*' => 'required|image',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'status' => 'required|in:Active,Inactive',
            'featured' => 'required|in:Yes,No',

        ]);

        $list=[];

        foreach($validated['images'] as $image){
            $img=Image::make($image);
            $filename = "img".date('YmdHis').rand(1000,9999).".jpg";
            $img->resize(1280,720,function($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(public_path("images/{$filename}"));

            $list[]=$filename;
        }

        $validated['images']=$list;

        Product::create($validated);


        flash('Product added')->success();
        return redirect()->route('cms.products.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('cms.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        {
            $validated= $request->validate([
                'name' => 'required|string',
                'summery' => 'required|string',
                'details' => 'required|string',
                'price' => 'required|numeric',
                'discounted_price' => 'nullable|numeric',
                'images.*' => 'nullable|image',
                'category_id' => 'required|exists:categories,id',
                'brand_id' => 'required|exists:brands,id',
                'status' => 'required|in:Active,Inactive',
                'featured' => 'required|in:Yes,No',

            ]);

            if ($request->hasFile('images')){

                $list=$product->images;

                foreach($validated['images'] as $image){
                    $img=Image::make($image);
                    $filename = "img".date('YmdHis').rand(1000,9999).".jpg";
                    $img->resize(1280,720,function($constraint){
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save(public_path("images/{$filename}"));

                    $list[]=$filename;
                }

                $validated['images']=$list;
            }


            $product->update($validated);


            flash('Product updated')->success();
            return redirect()->route('cms.products.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        foreach($product->images as $image){
            @unlink(public_path("images/{$image}"));
        }


        $product->delete();

        flash('Product removed.')->success();

        return redirect()->route('cms.products.index');
    }
}
