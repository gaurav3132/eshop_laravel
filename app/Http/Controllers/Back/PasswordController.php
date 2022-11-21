<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('cms.password.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password:cms',
            'new_password' => 'required|confirmed'
        ],[
            'old_password.current_password' => 'The old password is incorrect.'
        ]);

        Auth::guard('cms')->user()->update([
            'password' => $request->new_password

        ]);

        flash('Pasword changed.')->success();
        return redirect()->route('cms.password.edit');

    }
}
