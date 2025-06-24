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
            'breed'            => 'string|max:255',
            'color'            => 'string|max:255',
            'marks'            => 'string|max:255',
            'weight'           => 'numeric|min:0',
            'length'           => 'numeric|min:0',
            'height'           => 'numeric|min:0',
            'age'              => 'integer|min:0|max:30',
            'birth_date'       => 'date',
            'gotcha_date'      => 'date',
            'microchip_number' => 'string|max:50',
            'chip_company'     => 'string|max:255',
            'misc'             => 'string|max:2000',
            'photo'            => 'mimes:jpeg,png,jpg,gif',
        ]);

        if (request('photo')) {
            $inputs['photo'] = $request->file('photo')->store('images/dogs');
        }

        // Create the dog record
        $dog = auth()->user()->dogs()->create($inputs);

        // Attach the user to the dog
        auth()->user()->dogs()->attach($dog->id);

        // Flash a success message
        session()->flash('message', 'Dog registered successfully!');

        // Redirect to the home page
        return redirect()->route('home');
    }
}