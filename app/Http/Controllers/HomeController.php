<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        if (Auth::check()) {
            $tiles = array(
                array(
                    'activity' => 'meal',
                    'icon'     => 'feed',
                ),
                array(
                    'activity' => 'walk',
                    'icon'     => 'dogwalk',
                    'class'    => 'walkBox',
                ),
                array(
                    'activity' => 'potty',
                    'icon'     => 'potty',
                    'class'    => 'pottyBox',
                ),
                array(
                    'activity' => 'treat',
                    'icon'     => 'treat',
                    'class'    => 'treatBox',
                ),
                array(
                    'activity' => 'med',
                    'icon'     => 'meds',
                    'class'    => 'medBox',
                ),
                array(
                    'activity' => 'bath',
                    'icon'     => 'bath',
                    'class'    => 'bathBox',
                ),
                array(
                    'activity' => 'dog_registry',
                    'icon'     => 'registry',
                    'class'    => 'registerBox',
                    'nolog'    => true,
                ),
                array(
                    'activity' => 'fast_glance',
                    'icon'     => 'kwik',
                    'class'    => 'quickBox',
                    'nolog'    => true,
                )
            );

            $return_value = view('index', compact('tiles'));
        } else {
            $return_value = view('index');
        }
        return $return_value;
    }
}
