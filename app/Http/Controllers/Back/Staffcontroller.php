<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;


class Staffcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs= Admin::where('type','Staff')->latest()->paginate(10);

        return view('cms.staff.index',compact('staffs'));
    }

    public function create()
    {
        return view('cms.staff.create');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:admins',
            'new_password' => 'required|confirmed',
            'phone' => 'required|max:30',
            'address' => 'required|string',
            'status' => 'required|in:Active,Inactive',

        ]);
        $validated['password']=$validated['new_password'];

        Admin::create($validated);

        flash('Staff Added.')->success();

        return redirect()->route('cms.staffs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff=Admin::findOrFail($id);
        return view('cms.staff.edit',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $staff)
    {
        $validated=$request->validate([
            'name' => 'required|string',
            'phone' => 'required|max:30',
            'address' => 'required|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        $staff->update($validated);

        flash('Staff updated.')->success();
        return redirect()->route('cms.staffs.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $staff)
    {
        $staff->delete();

        flash('Staff removed')->success();

        return redirect()->route('cms.staffs.index');

    }
}
