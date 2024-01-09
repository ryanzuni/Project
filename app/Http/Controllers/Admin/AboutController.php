<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\AboutRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::with('category')
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);

        return view('admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get(['name', 'id']);

        return view('admin.abouts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        if ($request->validated()) {
            $image = $request->file('image')->store('about/images', 'public');
            $slug = Str::slug($request->title, '-');
    
            About::create($request->except('images') + ['slug' => $slug, 'image' => $image]);
        }

        //if($request->validated()) {
          //  $image = $request->file('image')->store(
            //    'about/images', 'public'
            //);
            //$slug = Str::slug($request->title, '-');

//            About::create($request->except('images') + ['slug' => $slug, 'image' => $image]);
  //      }

        return redirect()->route('admin.abouts.index')->with([
            'message' => 'Success Created !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        $categories = Category::get(['name','id']);

        return view('admin.abouts.edit', compact('about','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, About $about)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->title, '-');
            
            if ($request->hasFile('image')) {
                File::delete('storage/'. $about->image);
                $image = $request->file('image')->store('about/images', 'public');
                $about->update($request->except('image') + ['slug' => $slug, 'image' => $image]);
            } else {
                $about->update($request->except('image') + ['slug' => $slug]);
            }
        }
        //if($request->validated()) {
          //  $slug = Str::slug($request->title, '-');
            //if($request->image) {
              //  File::delete('storage/'. $about->image);
                //$image = $request->file('image')->store(
                  //  'about/images', 'public'
                //);
                //$about->update($request->except('image') + ['slug' => $slug, 'image' => $image]);
            //}else {
              //  $about->update($request->validated() + ['slug' => $slug]);
           // }
        //}

        return redirect()->route('admin.abouts.index')->with([
            'message' => 'Success Updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        File::delete('storage/'. $about->image);
        $about->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
