<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Machines;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $machinesByOwner = Machines::byOwner()->count();
        return view('home', compact('machinesByOwner'));
    }
}
