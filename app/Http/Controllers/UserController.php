<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

	public function __construct()
	{
		//$this->middleware(['guest']);
	}

	public function create()
	{
		return view('register');
	}

	//store data
	public function store(Request $request)
	{
		$formData = $request->validate([
			'name' => 'required|max:255',
			'email' => ['required', 'email', Rule::unique('users', 'email')],
			'password' => 'required|confirmed|min:6',
		]);

		//hash password
		$formData['password'] = Hash::make($formData['password']);

		//using the user class
		$user = User::create($formData);

		//login user
		auth()->login($user);

		//redirect to the home page
		return redirect()->route('dashboard')->with('message', 'user created and logged in');

	}

	public function login()
	{
		return view('login');
	}

	public function authenticate(Request $request)
	{

		$formData = $request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);

		if (auth()->attempt($formData, $request->remember)) {
			$request->session()->regenerate();
			return redirect()->route('dashboard')->with('message', 'You are logged in');
		}

		return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
	}

	public function logout(Request $request)
	{

		auth()->logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('home');
	}
}
