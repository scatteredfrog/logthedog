<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Dog;
use App\Models\User;

class DogController extends Controller
{
    public function registry(): View
    {
        return view('dog.registry');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $inputs = request()->validate([
            'name'             => 'required|string|max:100',
            'breed'            => 'nullable|string|max:255',
            'color'            => 'nullable|string|max:255',
            'marks'            => 'nullable|string|max:255',
            'weight'           => 'nullable|numeric|min:0',
            'length'           => 'nullable|numeric|min:0',
            'height'           => 'nullable|numeric|min:0',
            'age'              => 'nullable|integer|min:0|max:30',
            'birth_date'       => 'nullable|date',
            'gotcha_date'      => 'nullable|date',
            'microchip_number' => 'nullable|string|max:50',
            'chip_company'     => 'nullable|string|max:255',
            'misc'             => 'nullable|string|max:2000',
            'photo'            => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);

        if (request('photo')) {
            $inputs['photo'] = $request->file('photo')->store('images/dogs');
        }

        // Create the dog record
        $dog = auth()->user()->dogs()->create($inputs);

        // Flash a success message
        session()->flash('message', 'Dog registered successfully!');

        // Redirect to the home page
        return redirect()->route('home');
    }
}