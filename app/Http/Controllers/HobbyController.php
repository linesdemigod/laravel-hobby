<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
	public function index()
	{
		return view('hobby');
	}

	public function display()
	{
		//$hobby = Hobby::where('age', '23')->paginate(2);
		//$hobby = Hobby::orderBy('created_at', 'asc')->paginate(2);
		$hobby = Hobby::latest()->filter(request(['search']))->paginate(3);
		//$hobby = Hobby::get(); //to get all data

		return view('dashboard', [
			'hobby' => $hobby,
		]);
	}

	//create
	public function store(Request $request)
	{
		$formData = $request->validate([
			'name' => 'required|max:40',
			'age' => 'required|numeric|min:2',
			'hobby' => 'required',

		]);

		//get the id of the signed in user
		$formData['user_id'] = auth()->id();

		Hobby::create($formData);

		return redirect()->route('dashboard')->with('message', 'Hobby created Successfully');

	}

	//display single listing
	public function show(Hobby $hobby)
	{

		return view('show', [
			'hobby' => $hobby,
		]);
	}

	//edit
	public function edit(Hobby $hobby)
	{
		$this->authorize('edit', $hobby);
		return view('edit', ['hobby' => $hobby]);
	}

	//update
	public function update(Request $request, Hobby $hobby)
	{

		$formData = $request->validate([
			'name' => 'required|max:40',
			'age' => 'required|numeric|min:2',
			'hobby' => 'required',

		]);

		$hobby->update($formData);

		return redirect()->route('dashboard')->with('message', 'Hobby updated Successfully');

	}

	//delete
	public function destroy(Hobby $hobby)
	{
		//make sure logged user is owner
		// if ($hobby->user_id != auth()->id()) {
		// 	abort(403, 'Unauthorised action');
		// }

		$this->authorize('delete', $hobby); //from the policy
		$hobby->delete();

		return redirect()->route('dashboard');
	}
}
