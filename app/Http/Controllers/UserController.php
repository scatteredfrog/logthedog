<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(): View
    {
        return view('profile', [
            'user' => Auth::user(),
        ]);
    }
}
