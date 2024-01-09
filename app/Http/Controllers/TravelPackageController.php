<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\Comment;

class TravelPackageController extends Controller
{
    public function index()
    {
        $travel_packages = TravelPackage::with('galleries')
                                        ->orderBy('created_at', 'desc')
                                        ->get();
        $comments=Comment::all();

        return view('travel_packages.index', compact('travel_packages', 'comments'));
    }

    public function show(TravelPackage $travel_package)
    {
        $travel_packages = TravelPackage::where('id', '!=', $travel_package->id)->get();

        return view('travel_packages.show', compact('travel_package', 'travel_packages'));
    }

    public function showCommentSection(TravelPackage $travel_package)
    {
        $comments = Comment::all(); // You can adjust this based on how you associate comments with travel packages.

        return view('comment_section', compact('travel_package', 'comments'));
    }

    public function storeComment(Request $request, TravelPackage $travel_package)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'travel_package_id' => $travel_package->id,
            // Add any other fields you may need...
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
