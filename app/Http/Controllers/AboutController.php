<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\TravelPackage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::orderBy('created_at', 'desc')->get();

        return view('abouts.index', compact('abouts'));
    }

    public function show(About $about)
    {
        $relatedAbouts = About::where('id','!=',$about->id)
                ->where('category_id', $about->category_id)
                ->get();
        $categories = Category::get();
        $travel_packages = TravelPackage::with('galleries')->get()->take(2);

        $about->incrementReadCount();

        return view('abouts.show', compact('about','travel_packages','relatedAbouts','categories'));
    }

    public function category(Category $category)
    {
        $abouts = About::where('category_id', $category->id)->get();

        return view('abouts.category', compact('abouts', 'category'));
    }
}
