<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user=Auth::guard('cms')->user();
        return view('cms.profile.edit',compact('user'));
    }

    public function update(ProfileRequest $request)
    {

        $user=Auth::guard('cms')->user();

        $user->update($request->validated());

        flash('Profile updated.')->success();

        return redirect()->route('cms.profile.edit');
    }


}
