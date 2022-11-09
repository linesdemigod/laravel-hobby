<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetMail;
use App\Models\PasswordResets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
	//show the forgot password
	public function show()
	{
		return view('forgotpassword');
	}

	public function reset($token)
	{
		return view('reset-password', [
			'token' => $token,
		]);
	}

	//store the token
	public function store(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email|exists:users',
		]);

		$token = Str::random(64);

		PasswordResets::create([
			'email' => $request->email,
			'token' => $token,
		]);

		Mail::to($request->email)->send(new PasswordResetMail($request->email, ['token' => $token]));

		//redirect to the home page
		return redirect()->route('login')->with('message', 'reset password link sent to mail');
	}

	public function update(Request $request)
	{
		$request->validate([
			'email' => 'required|email|exists:users',
			'password' => 'required|string|min:6|confirmed',
			'password_confirmation' => 'required',
		]);

		$updatePassword = PasswordResets::where([
			'email' => $request->email,
			'token' => $request->token,
		])->first();

		if (!$updatePassword) {
			return back()->withInput()->with('error', 'Invalid token!');
		}

		$user = User::where('email', $request->email)
			->update(['password' => Hash::make($request->password)]);
		PasswordResets::where(['email' => $request->email])->delete();

		return redirect()->route('login')->with('message', 'Your password has been changed!');
	}

}
