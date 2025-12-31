<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('position')->get();
        return view('pages.bannermanage.banner', compact('banners'));
    }
    public function storebanner(Request $request)
    {
        $request->validate([
            'banner_image' => 'required|image|max:2048'
        ]);

       
        $path = $request->file('banner_image')->store('banner', 'public');

        
        $position = Banner::max('position') ? Banner::max('position') + 1 : 1;

        
        Banner::create([
            'image' => $path,
            'position' => $position
        ]);

        return back()->with('success', 'Banner uploaded successfully!');
    }
}
