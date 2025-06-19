<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LogitController extends Controller
{
    public function log_meal(): View
    {
        return view('logit.meal');
    }

    public function log_walk(): View
    {
        return view('logit.walk');
    }

    public function log_potty(): View
    {
        return view('logit.potty');
    }

    public function log_treat(): View
    {
        return view('logit.treat');
    }

    public function log_med(): View
    {
        return view('logit.med');
    }

    public function log_bath(): View
    {
        return view('logit.bath');
    }
}
