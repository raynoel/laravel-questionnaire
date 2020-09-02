<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


    // Affiche tous les questionnaires appartenant au visiteur
    public function index() {
        $questionnaires = auth()->user()->questionnaires;
        return view('home', compact('questionnaires'));
    }
}
