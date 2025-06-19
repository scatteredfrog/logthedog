<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
class DogController extends Controller
{
    public function registry(): View
    {
        return view('dog.registry');
    }
}