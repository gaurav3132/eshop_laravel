<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::latest()->paginate(10);

        return view('cms.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated= $request->validate([
            'image' => 'required|image',
            'status' => 'required|in:Active,Inactive',
        ]);

        $img= Image::make($request->file('image'));
        $filename = "img".date('YmdHis').rand(1000,9999).".jpg";
        $img->fit(1920,800)->save(public_path("images/{$filename}"));

        $validated['filename']=$filename;
        Slider::create($validated);

        flash('Slider added')->success();

        return redirect()->route('cms.sliders.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('cms.sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $validated= $request->validate([
            'status' => 'required|in:Active,Inactive',
        ]);

        $slider->update($validated);

        flash('Slider status changed')->success();

        return redirect()->route('cms.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        @unlink('public/images/'.$slider->filename);

        $slider->delete();

        flash('Slider removed')->success();

        return redirect()->route('cms.sliders.index');
    }
}
