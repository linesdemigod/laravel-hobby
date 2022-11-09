<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
{
	public function index()
	{
		return view('reset.change-password');
	}

	public function update(Request $request)
	{

		$request->validate([
			'current_password' => 'required',
			'password' => 'required|string|min:6|confirmed',
		]);

		//if the current password is not the same as the one in db
		if (!Hash::check($request->current_password, auth()->user()->password)) {
			return redirect()->route('changepassword')->with('message', 'Your current password is incorrect!');
		}

		User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);

		return redirect()->route('changepassword')->with('message', 'Your password successfully changed!');
	}
}
