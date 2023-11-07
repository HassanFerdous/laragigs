<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
	function index()
	{
		$listings = Listing::latest()->filter(request(['tag', 'search']))->paginate(6);

		return view('listings.index', ['listings' => $listings]);
	}

	function listing(Listing $listing)
	{
		return view('listings.show', ['listing' => $listing]);
	}

	function create()
	{
		return view('listings.create');
	}

	function store(Request $request)
	{
		$formFields = $request->validate([
			'title' => 'required',
			'tags' => 'required',
			'company' => ['required', Rule::unique('listings', 'company')],
			'location' => 'required',
			'email' => ['required', 'email'],
			'website' => 'required',
			'description' => 'required'
		]);

		if ($request->hasFile('logo')) {
			$formFields['logo'] = $request->file('logo')->store('logos', 'public');
		}
		$formFields['user_id'] = auth()->id();
		Listing::create($formFields);
		return redirect('/');
	}

	function edit(Listing $listing)
	{
		return view('listing.edit', ['listing' => $listing]);
	}

	function update(Request $request, Listing $listing)
	{
		$formFields = $request->validate([
			'title' => 'required',
			'tags' => 'required',
			'company' => ['required'],
			'location' => 'required',
			'email' => ['required', 'email'],
			'website' => 'required',
			'description' => 'required'
		]);

		if ($request->hasFile('logo')) {
			$formFields['logo'] = $request->file('logo')->store('logos', 'public');
		}

		$listing->update($formFields);
		return back();
	}

	function manage()
	{
		return view('listings.manage', ['listings' => auth()->user()->listings]);
	}

	function delete(Listing $listing)
	{
		$listing->delete();
		return redirect('/');
	}
}
