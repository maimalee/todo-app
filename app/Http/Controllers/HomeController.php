<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return string
     */
    public function index()
    {
        return view('home', [
            'showFooter' => false,
            'showTopBar' => false,
            'showSideBar' => true,

        ]);

    }
}
