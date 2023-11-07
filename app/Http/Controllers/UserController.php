<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
	function create()
	{
		return view('register');
	}

	function store(Request $request)
	{
		$formFields = $request->validate([
			'name' => ['required', 'min:3'],
			'email' => ['required', 'email', Rule::unique('users', 'email')],
			'password' => 'required|confirmed|min:6'
		]);

		//Has password
		$formFields['password'] = bcrypt($formFields['password']);

		//Create user
		$user = User::create($formFields);

		// Login user
		auth()->login($user);

		return redirect('/')->with('message', 'User created and Logged in!!');
	}

	//Login form
	function login_form()
	{
		return view('login');
	}

	// Login user
	function authenticate(Request $request)
	{
		$formFields = $request->validate([
			'email' => ['required', 'email'],
			'password' => 'required'
		]);

		if (auth()->attempt($formFields)) {
			$request->session()->regenerate();
			return redirect('/')->with('message', 'You are logged in!');
		}

		return back()->withErrors(['email' => 'Inavalid Credentials!!'])->onlyInput('email');
	}

	function logout()
	{
		auth()->logout();
		request()->session()->invalidate();
		request()->session()->regenerateToken();
		return redirect('/')->with('message', 'You have been logged out!!');
	}
}
