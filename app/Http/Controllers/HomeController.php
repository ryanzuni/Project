<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Models\TravelPackage;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $travel_packages = TravelPackage::with('galleries')
                        ->orderBy('created_at', 'desc')
                        ->get();
        $abouts = About::orderBy('created_at', 'desc')
                        ->take(3)
                        ->get();

        return view('homepage', compact('travel_packages','abouts'));
    }
}
