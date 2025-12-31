<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('pages.bannermanage.banner', compact('banners'));
    }
    public function storebanner(Request $request)
    {
        $request->validate([ 'banner_image' => 'required|image|max:5120' ]);

        if ($request->hasFile('banner_image')) {
            try {
                $path = $request->file('banner_image')->store('banner', 'public');

                
                $position = Banner::max('position') ? Banner::max('position') + 1 : 1;

              
                Banner::create([
                    'image' => $path,
                    'position' => $position
                ]);

              
                return back()->with('success', 'Banner uploaded successfully!');
            } catch (\Exception $e) {
                
                return back()->with('fail', 'Failed to upload banner. Please try again.');
            }
        } else {
         
            return back()->with('fail', 'No banner file selected.');
        }
    }

    public function deletebanner($banner_id)
    {
        $data = Banner::find($banner_id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('banner.index');
    }

    public function getImage($id){
        $image = Banner::find($id);
        return response()->json([
            'url' => asset('storage/'.$image->image),
             'position' => $image->position,
        ]);
    }
    public function getAllBanners()
    {
        $banners = Banner::orderBy('position', 'asc')->get()->map(function ($banner) {
            return [
                'url' => asset('storage/' . $banner->image), 
                'position' => $banner->position,
            ];
        });

        return response()->json($banners);
    }
}
