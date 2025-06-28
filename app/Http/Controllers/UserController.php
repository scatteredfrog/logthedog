<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function profile(): View
    {
        return view('profile', [
            'user' => Auth::user(),
        ]);
    }

    public function update(User $user): View
    {
        $request = request();

        $inputs = request()->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|string|email|max:100',
        ]);

        $inputs['language_preference'] = $request->language_preference;

        // Go through the fields we want to check. If the submitted value of
        // a field does not match the original value, we know we need to change
        // it, so add it to an array that holds those new values.
        foreach($inputs as $field => $value) {
            if ($value != request()->{'current_'. $field}) {
                $updated_user[$field] = $value;
            }
        }

        if (!empty($updated_user)) {
            $is_changed = $user->update($updated_user);
        }

        return view('profile', ['user' => $user]);
    }
}
