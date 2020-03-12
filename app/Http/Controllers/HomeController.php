<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cause;
use Auth;
use App\User;
use App\Judge;
use App\Court;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $causes = Cause::all();
        $judges = Judge::all();
        $courts = Court::all();
        $registrars = User::where('user_type', 'registrar')->get();
        return view('home', compact('causes', 'registrars', 'judges', 'courts'));
    }
}
