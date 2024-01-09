<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\TravelPackage;

// app/Http/Controllers/CommentsController.php

class CommentsController extends Controller
{

    public function index()
    {
        $comments=Comment::all();

        return view('travel_packages', compact('comments'));
    }

    public function showPackageList()
    {
        $travel_packages = TravelPackage::all();
        $comments = Comment::all(); // Add this line to get comments

        return view('package-list', compact('travel_packages', 'comments'));
    }
    
    public function store(Request $request, TravelPackage $travel_package)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        
        $travel_package->comments()->create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}