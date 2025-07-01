<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LogitController extends Controller
{
    // LOG A MEAL
    public function log_meal(): View
    {
        // Get the user's dogs.
        $dogs = auth()->user()->dogs;
        return view('logit.meal', compact('dogs'));
    }

    public function meal_store()
    {
        $inputs = request()->validate([
            'dog_id.*'    => 'required|exists:dogs,id',
            'meal_time.*' => 'required',
            'meal_date.*' => 'required',
            'notes.*'     => 'nullable|string|max:255',
        ]);

        if (isset($inputs['dog_id'])) {
            foreach ($inputs['dog_id'] as $id) {
                $meal_time = $inputs['meal_date'][$id] . ' ' . $inputs['meal_time'][$id];
                $notes = $inputs['notes'][$id];
                auth()->user()->dogs()->find($id)->meal()->create([
                    'meal_time' => $meal_time,
                    'notes'     => $notes,
                ]);
            }
            return redirect()->route('home')
                ->with('success', 'Meal logged successfully!');
        } else {
            return redirect()->back()
                ->with('error', 'Please select at least one dog to log a meal.')
                ->withInput();
        }
    }

    // LOG A WALK
    public function log_walk(): View
    {
        return view('logit.walk');
    }

    // LOG A POTTY
    public function log_potty(): View
    {
        // Get the user's dogs.
        $dogs = auth()->user()->dogs;
        return view('logit.potty', compact('dogs'));
    }

    public function potty_store()
    {
        $inputs = request()->validate([
            'dog_id.*'      => 'required|exists:dogs,id',
            'potty_type.*'  => 'required|in:1,2',
            'potty_time.*'  => 'required',
            'potty_date.*'  => 'required',
            'notes.*'       => 'nullable|string|max:255',
        ]);

        if (isset($inputs['dog_id'])) {
            foreach ($inputs['dog_id'] as $id) {
                if (!isset($inputs['potty_type'])) {
                    return redirect()->back()->
                        with('error', 'Please select a potty type.');
                }
                $potty_time = $inputs['potty_date'][$id] . ' ' . $inputs['potty_time'][$id];
                $notes = $inputs['notes'][$id];
                auth()->user()->dogs()->find($id)->potty()->create([
                    'potty_type' => $inputs['potty_type'][$id],
                    'potty_time' => $potty_time,
                    'notes'      => $notes,
                ]);
            }
            return redirect()->route('home')
                ->with('success', 'Potty logged successfully!');
        } else {
            return redirect()->back()
                ->with('error', 'Please select at least one dog to log a potty.')
                ->withInput();
        }
    }

    // LOG A TREAT
    public function log_treat(): View
    {
        return view('logit.treat');
    }

    // LOG A MED
    public function log_med(): View
    {
        return view('logit.med');
    }

    // LOG A BATH
    public function log_bath(): View
    {
        // Get the user's dogs.
        $dogs = auth()->user()->dogs;
        return view('logit.bath', compact('dogs'));
    }

    public function bath_store()
    {
        $inputs = request()->validate([
            'dog_id.*'    => 'required|exists:dogs,id',
            'bath_time.*' => 'required',
            'bath_date.*' => 'required',
            'notes.*'     => 'nullable|string|max:255',
        ]);

        if (isset($inputs['dog_id'])) {
            foreach ($inputs['dog_id'] as $id) {
                $bath = $inputs['bath_date'][$id] . ' ' . $inputs['bath_time'][$id];
                $notes = $inputs['notes'][$id];
                auth()->user()->dogs()->find($id)->bath()->create([
                    'bath_time' => $bath,
                    'notes'     => $notes,
                ]);
            }
            return redirect()->route('home')
                ->with('success', 'Bath logged successfully!');
        } else {
            return redirect()->back()
                ->with('error', 'Please select at least one dog to log a bath.')
                ->withInput();
        }
    }

}
